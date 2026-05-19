<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Result;
use App\Models\TestSession;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResultStorageTest extends TestCase
{
    use RefreshDatabase;

    public function test_result_is_saved_to_database(): void
    {
        // USER
        $user = User::factory()->create();

        // LOGIN
        $this->actingAs($user);

        // TEST SESSION
        $session = TestSession::create();

        // SESSION ANSWERS
        $answers = [

            3 => 3,
            5 => 3,
            10 => 3,
            13 => 3,
            16 => 3,
            17 => 3,
            21 => 3,

        ];


        $user = User::factory()->create();

        $this->actingAs($user);
        // HIT ROUTE HASIL
        $this->withSession([

            'answers' => $answers,
            'test_session_id' => $session->id

        ])->get('/hasil');

        // ASSERT DATABASE
        $this->assertDatabaseHas('results', [

            'test_session_id' => $session->id,
            'score_depression' => 42,

        ]);
    }

    public function test_result_belongs_to_user(): void
    {
        // USER
        $user = User::factory()->create();

        $session = TestSession::create();

        // RESULT
        $result = Result::create([

            'user_id' => $user->id,

            'test_session_id' => $session->id,

            'score_depression' => 10,
            'score_anxiety' => 8,
            'score_stress' => 12,

            'category_depression' => 'Ringan',
            'category_anxiety' => 'Normal',
            'category_stress' => 'Normal',

        ]);
        // ASSERT
        $this->assertEquals(
            $user->id,
            $result->user->id
        );
    }
}
