<?php

namespace App\Services;

class DassScoringService
{
    public function calculate(array $answers)
    {
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

        return [
            'depresi' => $depresi * 2,
            'anxiety' => $anxiety * 2,
            'stress' => $stress * 2,
        ];
    }

    public function depressionCategory($score)
    {
        if ($score <= 9) return 'Normal';
        if ($score <= 13) return 'Ringan';
        if ($score <= 20) return 'Sedang';
        if ($score <= 27) return 'Berat';

        return 'Sangat Berat';
    }

    public function anxietyCategory($score)
    {
        if ($score <= 7) return 'Normal';
        if ($score <= 9) return 'Ringan';
        if ($score <= 14) return 'Sedang';
        if ($score <= 19) return 'Berat';

        return 'Sangat Berat';
    }

    public function stressCategory($score)
    {
        if ($score <= 14) return 'Normal';
        if ($score <= 18) return 'Ringan';
        if ($score <= 25) return 'Sedang';
        if ($score <= 33) return 'Berat';

        return 'Sangat Berat';
    }
}
