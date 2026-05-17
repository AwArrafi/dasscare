<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_redirect_to_admin_dashboard(): void
    {
        // BUAT USER ADMIN
        $admin = User::factory()->create([

            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'

        ]);

        // LOGIN
        $response = $this->post('/login', [

            'email' => 'admin@gmail.com',
            'password' => '123456'

        ]);

        // EXPECT REDIRECT
        $response->assertRedirect('/admin');
    }

    public function test_user_cannot_access_admin_dashboard(): void
    {
        // BUAT USER BIASA
        $user = User::factory()->create([

            'role' => 'user'

        ]);

        // LOGIN SEBAGAI USER
        $this->actingAs($user);

        // COBA AKSES ADMIN
        $response = $this->get('/admin');

        // EXPECT REDIRECT
        $response->assertRedirect('/');
    }
}
