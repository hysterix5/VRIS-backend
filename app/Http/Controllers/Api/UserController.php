<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->userList();
    }

    public function show(int $userId)
    {
        return $this->userService->userById($userId);
    }

    public function store(Request $request)
    {
        return $this->userService->createUser($request);
    }

    public function update(Request $request, int $userId)
    {
        return $this->userService->updateUser($request, $userId);
    }

    public function delete(int $userId)
    {
        $this->userService->deleteUser($userId);
    }
}
