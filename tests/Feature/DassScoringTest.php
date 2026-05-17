<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\DassScoringService;

class DassScoringTest extends TestCase
{
    public function test_depression_score_calculation(): void
    {
        $service = new DassScoringService();

        $answers = [

            3 => 3,
            5 => 3,
            10 => 3,
            13 => 3,
            16 => 3,
            17 => 3,
            21 => 3,

        ];

        $result = $service->calculate($answers);

        $this->assertEquals(42, $result['depresi']);
    }

    public function test_depression_category_is_very_severe(): void
    {
        $service = new DassScoringService();

        $category = $service->depressionCategory(42);

        $this->assertEquals('Sangat Berat', $category);
    }

    public function test_anxiety_category_is_very_severe(): void
    {
        $service = new DassScoringService();

        $category = $service->anxietyCategory(30);

        $this->assertEquals('Sangat Berat', $category);
    }

    public function test_stress_category_is_very_severe(): void
    {
        $service = new DassScoringService();

        $category = $service->stressCategory(40);

        $this->assertEquals('Sangat Berat', $category);
    }
}
