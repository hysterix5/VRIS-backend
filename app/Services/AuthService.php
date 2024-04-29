<?php

namespace App\Services;

use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate(object $payload)
    {
        $user = $this->userRepository->showByUsername($payload->username);

        if (!$user) {
            return response()->json(['message' => 'No account is associated with the username provided.']);
        }

        if ($user) {
            if (!Hash::check($payload->password, $user->password)) {
                return response()->json(['message' => 'Password is incorrect.']);
            }

            $token = $user->createToken('auth-token')->plainTextToken;

            $data = (object) [
                'token' => $token,
                'user' => new UserResource($user),
            ];

            return new AuthResource($data);
        }
    }

    public function unauthenticate()
    {
        $user = auth()->user();

        $user->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out.']);
    }
}
