<?php

namespace App\Http\Controllers;

use App\Domain\Services\UserService;
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

    }

    public function updateUser()
    {

    }

    public function deleteUser()
    {

    }

    public function listUsers()
    {

    }

    public function createUserTransaction(Request $request)
    {

    }

    public function listLastCreatedUsers()
    {
        $userList = $this->service->listLastCreatedUsers();
        response()->json($userList);
    }
}
