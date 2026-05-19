<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register(): void
    {
        $response = $this->post('/register', [

            'name' => 'Rafi',

            'email' => 'rafi@gmail.com',

            'password' => '123456',
            'password_confirmation' => '123456',

            'gender' => 'Laki-laki',

            'job' => 'Mahasiswa',

            'city' => 'Semarang',

            'phone' => '08123456789',

        ]);

        // USER MASUK DB
        $this->assertDatabaseHas('users', [

            'email' => 'rafi@gmail.com',

            'role' => 'user',

        ]);

        // REDIRECT
        $response->assertRedirect('/');
    }
}
