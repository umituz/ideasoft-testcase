<?php

namespace App\Services\Auth;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepositoryInterface;
use App\Traits\Logger;
use Illuminate\Http\Response;

/**
 * Class LoginService
 */
class LoginService
{
    use Logger;

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return array
     */
    public function login($request)
    {
        if (! auth()->attempt($request->only('email', 'password'))) {
            return [
                'statusCode' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => [
                    'email' => __('The provided credentials are incorrect!'),
                    'password' => __('The provided credentials are incorrect!'),
                ],
                'message' => __('Login Failed'),
            ];
        }

        $user = auth()->user();
        $token = $user->createToken('authToken')->plainTextToken;
        $item = new UserResource($user);

        return [
            'user' => $item,
            'token' => $token,
        ];
    }
}
