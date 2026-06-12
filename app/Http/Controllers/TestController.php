<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use App\Models\TestSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Recommendation;
use App\Services\PriorityRuleService;

class TestController extends Controller
{
    public function index($step)
    {

        if (!Session::has('test_session_id')) {

            $testSession = TestSession::create();

            session([
                'test_session_id' => $testSession->id
            ]);
        }

        $questions = Question::all();

        if ($step < 1 || $step > $questions->count()) {
            return redirect('/tes/1');
        }

        $question = $questions[$step - 1];

        return view('test.step', [
            'question' => $question,
            'step' => $step,
            'total' => $questions->count()
        ]);
    }

    public function submit(Request $request, $step)
    {

        $answers = Session::get('answers', []);

        $answers[$step] = $request->value;

        session(['answers' => $answers]);

        $totalQuestions = 21;

        // kalau belum pertanyaan terakhir
        if ($step < $totalQuestions) {

            return redirect('/tes/' . ($step + 1));
        }

        // kalau sudah selesai
        return redirect('/hasil');
    }

    public function hasil()
    {

        /** @var array $answers */
        $answers = Session::get('answers', []);

        $depresiQuestions = [3, 5, 10, 13, 16, 17, 21];
        $anxietyQuestions = [2, 4, 7, 9, 15, 19, 20];
        $stressQuestions = [1, 6, 8, 11, 12, 14, 18];

        $depresi = 0;
        $anxiety = 0;
        $stress = 0;

        foreach ($answers as $questionId => $value) {

            if (in_array($questionId, $depresiQuestions)) {

                $depresi += $value;
            }

            if (in_array($questionId, $anxietyQuestions)) {

                $anxiety += $value;
            }

            if (in_array($questionId, $stressQuestions)) {

                $stress += $value;
            }
        }

        // DASS-21 dikali 2
        $depresi *= 2;
        $anxiety *= 2;
        $stress *= 2;

        // KATEGORI
        $kategoriDepresi = $this->kategoriDepresi($depresi);
        $kategoriAnxiety = $this->kategoriAnxiety($anxiety);
        $kategoriStress = $this->kategoriStress($stress);

        // WARNA
        $warnaDepresi = $this->getColor($kategoriDepresi);
        $warnaAnxiety = $this->getColor($kategoriAnxiety);
        $warnaStress = $this->getColor($kategoriStress);

        // EMOJI
        $emojiDepresi = $this->getEmoji($kategoriDepresi);
        $emojiAnxiety = $this->getEmoji($kategoriAnxiety);
        $emojiStress = $this->getEmoji($kategoriStress);

        // WIDTH BAR
        $widthDepresi = $this->getWidth($kategoriDepresi);
        $widthAnxiety = $this->getWidth($kategoriAnxiety);
        $widthStress = $this->getWidth($kategoriStress);

        // REKOMENDASI
        $rekomendasiDepresi = Recommendation::where(

            'dimension',
            'depression'

        )->where(

            'category',
            $kategoriDepresi

        )->first();

        $rekomendasiAnxiety = Recommendation::where(

            'dimension',
            'anxiety'

        )->where(

            'category',
            $kategoriAnxiety

        )->first();

        $rekomendasiStress = Recommendation::where(

            'dimension',
            'stress'

        )->where(

            'category',
            $kategoriStress

        )->first();

        /*
    |--------------------------------------------------------------------------
    | SAVE DATABASE HANYA JIKA LOGIN
    |--------------------------------------------------------------------------
    */

        if (Auth::check() && session()->has('test_session_id')) {

            $result = Result::firstOrCreate(

                [
                    'test_session_id' => session('test_session_id'),

                    'user_id' => Auth::id(),
                ],

                [
                    'score_depression' => $depresi,
                    'score_anxiety' => $anxiety,
                    'score_stress' => $stress,

                    'category_depression' => $kategoriDepresi,
                    'category_anxiety' => $kategoriAnxiety,
                    'category_stress' => $kategoriStress,
                ]

            );

            // HAPUS SESSION
            session()->forget('test_session_id');
            session()->forget('answers');

            // REDIRECT DETAIL
            return redirect('/hasil/' . $result->id);
        }

        /*
    |--------------------------------------------------------------------------
    | GUEST USER -> TAMPILKAN HASIL TANPA SAVE DATABASE
    |--------------------------------------------------------------------------
    */

        return view('hasil', [

            'depresi' => $depresi,
            'anxiety' => $anxiety,
            'stress' => $stress,

            'kategoriDepresi' => $kategoriDepresi,
            'kategoriAnxiety' => $kategoriAnxiety,
            'kategoriStress' => $kategoriStress,

            'warnaDepresi' => $warnaDepresi,
            'warnaAnxiety' => $warnaAnxiety,
            'warnaStress' => $warnaStress,

            'widthDepresi' => $widthDepresi,
            'widthAnxiety' => $widthAnxiety,
            'widthStress' => $widthStress,

            'emojiDepresi' => $emojiDepresi,
            'emojiAnxiety' => $emojiAnxiety,
            'emojiStress' => $emojiStress,

            'rekomendasiDepresi' => $rekomendasiDepresi,
            'rekomendasiAnxiety' => $rekomendasiAnxiety,
            'rekomendasiStress' => $rekomendasiStress,

            // TAMBAHAN
            'resultId' => isset($result) ? $result->id : null,

        ]);
    }

    private function kategoriDepresi($score)
    {
        if ($score <= 9) return 'Normal';
        if ($score <= 13) return 'Ringan';
        if ($score <= 20) return 'Sedang';
        if ($score <= 27) return 'Berat';

        return 'Sangat Berat';
    }

    private function kategoriAnxiety($score)
    {
        if ($score <= 7) return 'Normal';
        if ($score <= 9) return 'Ringan';
        if ($score <= 14) return 'Sedang';
        if ($score <= 19) return 'Berat';

        return 'Sangat Berat';
    }

    private function kategoriStress($score)
    {
        if ($score <= 14) return 'Normal';
        if ($score <= 18) return 'Ringan';
        if ($score <= 25) return 'Sedang';
        if ($score <= 33) return 'Berat';

        return 'Sangat Berat';
    }

    private function getColor($kategori)
    {
        if (in_array($kategori, ['Berat', 'Sangat Berat'])) {
            return 'bg-red-500';
        }

        if ($kategori == 'Sedang') {
            return 'bg-yellow-500 text-black';
        }

        return 'bg-green-500 text-black';
    }

    private function getEmoji($kategori)
    {
        if (in_array($kategori, ['Berat', 'Sangat Berat'])) {
            return '/images/sad.png';
        }

        if ($kategori == 'Sedang') {
            return '/images/neutral.png';
        }

        return '/images/happy.png';
    }

    private function getWidth($kategori)
    {
        if (in_array($kategori, ['Berat', 'Sangat Berat'])) {
            return '100%';
        }

        if ($kategori == 'Sedang') {
            return '65%';
        }

        return '35%';
    }

    public function riwayat()
    {
        /** @var User $user */
        $user = Auth::user();

        $results = $user->results()
            ->latest()
            ->simplePaginate(8);

        return view('riwayat', compact('results'));
    }
    public function detailHasil($id)
    {
        $result = Result::findOrFail($id);

        // KATEGORI
        $kategoriDepresi = $result->category_depression;
        $kategoriAnxiety = $result->category_anxiety;
        $kategoriStress = $result->category_stress;

        // WARNA
        $warnaDepresi = $this->getColor($kategoriDepresi);
        $warnaAnxiety = $this->getColor($kategoriAnxiety);
        $warnaStress = $this->getColor($kategoriStress);

        // EMOJI
        $emojiDepresi = $this->getEmoji($kategoriDepresi);
        $emojiAnxiety = $this->getEmoji($kategoriAnxiety);
        $emojiStress = $this->getEmoji($kategoriStress);

        // WIDTH
        $widthDepresi = $this->getWidth($kategoriDepresi);
        $widthAnxiety = $this->getWidth($kategoriAnxiety);
        $widthStress = $this->getWidth($kategoriStress);

        // REKOMENDASI

        $rekomendasiDepresi = Recommendation::where(

            'dimension',
            'depression'

        )->where(

            'category',
            $kategoriDepresi

        )->first();

        $rekomendasiAnxiety = Recommendation::where(

            'dimension',
            'anxiety'

        )->where(

            'category',
            $kategoriAnxiety

        )->first();

        $rekomendasiStress = Recommendation::where(

            'dimension',
            'stress'

        )->where(

            'category',
            $kategoriStress

        )->first();

        return view('hasil', [

            'depresi' => $result->score_depression,
            'anxiety' => $result->score_anxiety,
            'stress' => $result->score_stress,

            'kategoriDepresi' => $kategoriDepresi,
            'kategoriAnxiety' => $kategoriAnxiety,
            'kategoriStress' => $kategoriStress,

            'warnaDepresi' => $warnaDepresi,
            'warnaAnxiety' => $warnaAnxiety,
            'warnaStress' => $warnaStress,

            'widthDepresi' => $widthDepresi,
            'widthAnxiety' => $widthAnxiety,
            'widthStress' => $widthStress,

            'emojiDepresi' => $emojiDepresi,
            'emojiAnxiety' => $emojiAnxiety,
            'emojiStress' => $emojiStress,

            'rekomendasiDepresi' => $rekomendasiDepresi,
            'rekomendasiAnxiety' => $rekomendasiAnxiety,
            'rekomendasiStress' => $rekomendasiStress,

            'resultId' => $result->id
        ]);
    }

    public function selfCareDetail($id)
    {
        $result = Result::findOrFail($id);

        /*
    |--------------------------------------------------------------------------
    | PRIORITY RULE
    |--------------------------------------------------------------------------
    */

        $priorityRule = (new PriorityRuleService())->check(

            $result->category_depression,
            $result->category_anxiety,
            $result->category_stress

        );

        /*
    |--------------------------------------------------------------------------
    | MAIN RECOMMENDATION
    |--------------------------------------------------------------------------
    */

        $mainRecommendation = Recommendation::where(

            'dimension',
            'anxiety'

        )->where(

            'category',
            $result->category_anxiety

        )->first();

        /*
    |--------------------------------------------------------------------------
    | ADDITIONAL RECOMMENDATIONS
    |--------------------------------------------------------------------------
    */

        $additionalRecommendations = collect([
            (object) [
                'title' => 'Depresi',
                'category' => $result->category_depression,
                'content' => optional(
                    Recommendation::where('dimension', 'depression')
                        ->where('category', $result->category_depression)
                        ->first()
                )->content
            ],

            (object) [
                'title' => 'Kecemasan',
                'category' => $result->category_anxiety,
                'content' => optional(
                    Recommendation::where('dimension', 'anxiety')
                        ->where('category', $result->category_anxiety)
                        ->first()
                )->content
            ],

            (object) [
                'title' => 'Stress',
                'category' => $result->category_stress,
                'content' => optional(
                    Recommendation::where('dimension', 'stress')
                        ->where('category', $result->category_stress)
                        ->first()
                )->content
            ]
        ]);


        $colorDepresi = $this->getProgressColor(
            $result->category_depression
        );

        $colorAnxiety = $this->getProgressColor(
            $result->category_anxiety
        );

        $colorStress = $this->getProgressColor(
            $result->category_stress
        );

        $widthDepresi = $this->getProgressWidth(
            $result->category_depression
        );

        $widthAnxiety = $this->getProgressWidth(
            $result->category_anxiety
        );

        $widthStress = $this->getProgressWidth(
            $result->category_stress
        );

        return view('selfcare-detail', [

            'result' => $result,

            'priorityRule' => $priorityRule,

            'mainRecommendation' => $mainRecommendation,

            'additionalRecommendations' => $additionalRecommendations,

            'colorDepresi' => $colorDepresi,
            'colorAnxiety' => $colorAnxiety,
            'colorStress' => $colorStress,

            'widthDepresi' => $widthDepresi,
            'widthAnxiety' => $widthAnxiety,
            'widthStress' => $widthStress,

        ]);
    }

    private function getProgressColor($category)
    {
        return match ($category) {

            'Normal' => 'bg-green-500',
            'Ringan' => 'bg-green-500',

            'Sedang' => 'bg-yellow-400',

            'Berat' => 'bg-red-500',
            'Sangat Berat' => 'bg-red-500',

            default => 'bg-gray-400',
        };
    }

    private function getProgressWidth($category)
    {
        return match ($category) {

            'Normal' => '25%',
            'Ringan' => '45%',

            'Sedang' => '65%',

            'Berat' => '85%',
            'Sangat Berat' => '100%',

            default => '30%',
        };
    }
}
