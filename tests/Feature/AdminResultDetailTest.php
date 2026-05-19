<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Result;
use App\Models\TestSession;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminResultDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_result_detail(): void
    {
        // ADMIN
        $admin = User::factory()->create([

            'role' => 'admin'

        ]);

        // USER
        $user = User::factory()->create([

            'name' => 'Rafi',
            'job' => 'Mahasiswa',
            'city' => 'Semarang',

        ]);

        // SESSION
        $session = TestSession::create();

        // RESULT
        $result = Result::create([

            'user_id' => $user->id,

            'test_session_id' => $session->id,

            'score_depression' => 21,
            'score_anxiety' => 6,
            'score_stress' => 20,

            'category_depression' => 'Berat',
            'category_anxiety' => 'Normal',
            'category_stress' => 'Sedang',

        ]);

        // LOGIN ADMIN
        $this->actingAs($admin);

        // ACCESS DETAIL
        $response = $this->get('/admin/results/' . $result->id);

        // ASSERT
        $response->assertStatus(200);

        $response->assertSee('Rafi');

        $response->assertSee('Mahasiswa');

        $response->assertSee('Semarang');

        $response->assertSee('21');

        $response->assertSee('Berat');
    }
}
