<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $this->refreshApplicationWithLocale('en-CA');

        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $this->refreshApplicationWithLocale('en-CA');

        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $this->refreshApplicationWithLocale('en-CA');

        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_edit_own_profiles()
    {
        $this->refreshApplicationWithLocale('en-CA');

        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get("/people/{$user->slug}/edit");
        $response->assertStatus(200);
    }

    public function test_users_can_not_edit_others_profiles()
    {
        $this->refreshApplicationWithLocale('en-CA');

        $user = User::factory()->create();
        $other_user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get("/people/{$other_user->slug}/edit");
        $response->assertStatus(403);
    }

    public function test_guests_can_not_edit_profiles()
    {
        $this->refreshApplicationWithLocale('en-CA');

        $user = User::factory()->create();

        $response = $this->get("/people/{$user->slug}/edit");
        $response->assertStatus(403);
    }
}
