<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function userList()
    {
        $users = $this->userRepository->index();

        return UserResource::collection($users);
    }

    public function userById(int $userId)
    {
        $user = $this->userRepository->showById($userId);

        return new UserResource($user);
    }

    public function userByEmail(string $email)
    {
        $user = $this->userRepository->showByEmail($email);

        return new UserResource($user);
    }

    public function updateUser(object $payload, int $userId)
    {
        $user = $this->userRepository->update($payload, $userId);

        return new UserResource($user);
    }

    public function createUser(object $payload)
    {
        $user = $this->userRepository->create($payload);

        return new UserResource($user);
    }

    public function deleteUser(int $userId)
    {
        $this->userRepository->delete($userId);

        return true;
    }
}
