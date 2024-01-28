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
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
        ]);

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertOk()
            ->assertJsonStructure([
                'statusCode',
                'message',
                'data' => [
                    'user' => [
                        'id',
                        'name',
                        'email',
                    ],
                    'token',
                ],
            ])
            ->assertJsonFragment(['message' => __('User Logged In')]);
    }

    /** @test */
    public function it_returns_error_for_invalid_login()
    {
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
        ]);

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'invalid_password',
        ]);

        $response->assertStatus(422)
        ->assertJsonStructure([
            'errors' => ['email', 'password'],
            'message',
            'statusCode'
        ])
            ->assertJsonFragment(['message' => __('Login Failed')]);
    }
}
