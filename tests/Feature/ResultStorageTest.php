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
}
