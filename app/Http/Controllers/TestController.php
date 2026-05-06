<?php

namespace App\Http\Controllers;

use App\Models\Question;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($step)
    {
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
        $answers = session()->get('answers', []);

        $answers[$request->question_id] = $request->value;

        session()->put('answers', $answers);

        $nextStep = $step + 1;

        $total = Question::count();

        if ($nextStep > $total) {
            // nanti kita proses hasil di sini
            return redirect('/hasil');
        }

        return redirect('/hasil');
    }

    public function hasil()
    {
        $answers = session('answers', []);

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

        $kategoriDepresi = $this->kategoriDepresi($depresi);
        $kategoriAnxiety = $this->kategoriAnxiety($anxiety);
        $kategoriStress = $this->kategoriStress($stress);

        $warnaDepresi = $this->getColor($kategoriDepresi);
        $warnaAnxiety = $this->getColor($kategoriAnxiety);
        $warnaStress = $this->getColor($kategoriStress);

        $emojiDepresi = $this->getEmoji($kategoriDepresi);
        $emojiAnxiety = $this->getEmoji($kategoriAnxiety);
        $emojiStress = $this->getEmoji($kategoriStress);

        return view('hasil', compact(
            'depresi',
            'anxiety',
            'stress',

            'kategoriDepresi',
            'kategoriAnxiety',
            'kategoriStress',

            'warnaDepresi',
            'warnaAnxiety',
            'warnaStress',

            'emojiDepresi',
            'emojiAnxiety',
            'emojiStress'
        ));
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
            return 'bg-yellow-300 text-black';
        }

        return 'bg-green-400 text-black';
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
}
