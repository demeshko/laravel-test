<?php

namespace App\Http\Controllers;

use App\Domain\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $service;

    /**
     * UserController constructor.
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email|email:rfc,dns',
        ]);
        $user = $this->service->createUser($request->all());
        return response()->json($user);
    }

    public function updateUser(Request $request, User $user)
    {
        return response()->json($this->service->updateUser($request->all(), $user->id));
    }

    public function deleteUser(User $user)
    {
        return response()->json($this->service->deleteUser($user->id));
    }

    public function showUser(User $user)
    {
        return response()->json($user);
    }

    public function createUserTransaction(Request $request)
    {
        return response()->json($this->service->createUserTransaction($request->all(), Auth()->user()->id));
    }

    public function listLastCreatedUsersWithTransactions()
    {
        return response()->json($this->service->listLastCreatedUsers());
    }
}
