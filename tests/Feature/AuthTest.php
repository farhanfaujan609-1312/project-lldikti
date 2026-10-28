<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Bank Sampah Warga');
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@banksampah.id',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@banksampah.id',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/dashboard');
    }

    public function test_users_cannot_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@banksampah.id',
            'password' => bcrypt('password'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'admin@banksampah.id',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Pendaftaran Petugas');
        $response->assertSee('Daftar Akun Baru');
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Petugas Baru',
            'email' => 'petugasbaru@banksampah.id',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'petugasbaru@banksampah.id',
            'name' => 'Petugas Baru',
        ]);
        $response->assertRedirect('/dashboard');
    }

    public function test_users_cannot_register_with_duplicate_email(): void
    {
        User::factory()->create([
            'email' => 'duplikat@banksampah.id',
        ]);

        $response = $this->from('/register')->post('/register', [
            'name' => 'Petugas Duplikat',
            'email' => 'duplikat@banksampah.id',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('email');
    }

    public function test_users_cannot_register_with_mismatched_password_confirmation(): void
    {
        $response = $this->from('/register')->post('/register', [
            'name' => 'Petugas Salah',
            'email' => 'salah@banksampah.id',
            'password' => 'password123',
            'password_confirmation' => 'berbeda456',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('password');
    }

    public function test_authenticated_users_are_redirected_away_from_register_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect('/dashboard');
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/login');
    }
}
