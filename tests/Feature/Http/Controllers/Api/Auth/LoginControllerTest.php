<?php

namespace Tests\Feature\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_successfully_login()
    {
        $user = User::factory()->create();
        $password = 'password'; // Change this with a valid password

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertOk()
            ->assertJsonStructure([
                'token',
                // Add other expected structure fields if needed
            ])
            ->assertJsonFragment(['message' => __('User Logged In')]);
    }

    /** @test */
    public function it_returns_error_for_invalid_login()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'invalid_password',
        ]);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'errors' => ['email', 'password'],
                'message',
            ])
            ->assertJsonFragment(['message' => __('Invalid credentials.')]);
    }
}
