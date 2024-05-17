<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function index()
    {
        return User::orderBy('id', 'desc')->paginate(10);
    }

    public function showById(int $userId)
    {
        return User::findOrFail($userId);
    }

    public function showByUsername(string $username)
    {
        return User::where('username', $username)->first();
    }

    public function update(object $payload, int $userId)
    {
        $user = User::findOrFail($userId);
        $user->firstname = $payload->firstname;
        $user->lastname = $payload->lastname;
        $user->email = $payload->email;
        $user->username = $payload->username;
        $user->access_level = $payload->access_level;

        if ($payload->password) {
            $user->password = Hash::make($payload->password);
        }
        $user->save();

        return $user->fresh();
    }

    public function create(object $payload)
    {
        $user = new User();
        $user->firstname = $payload->firstname;
        $user->lastname = $payload->lastname;
        $user->email = $payload->email;
        $user->username = $payload->username;
        $user->access_level = $payload->access_level;
        $user->password = Hash::make($payload->password);
        $user->save();

        return $user->fresh();
    }

    public function delete(int $userId)
    {
        User::findOrFail($userId)->delete();
    }
}
