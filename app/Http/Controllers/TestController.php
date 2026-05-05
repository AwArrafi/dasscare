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

        return redirect("/tes/$nextStep");
    }
}
