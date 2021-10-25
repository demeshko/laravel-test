<?php

namespace App\Domain\Services;

use App\Domain\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserServiceTest extends TestCase
{

    private $userRepoMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepoMock = $this->mock(UserRepository::class);
    }

    public function testCreateUserTransaction()
    {
        $this->userRepoMock->shouldReceive('createUserTransaction')->andReturn(new User());
        $userRepo = $this->app->instance(UserRepository::class, $this->userRepoMock);
        $userService = new UserService($userRepo);
        $user = $userService->createUserTransaction([], 1);
        $this->assertInstanceOf(User::class, $user);
        $this->assertInstanceOf(Collection::class, $user->transactions);
    }

    public function testCreateUser()
    {
        $this->userRepoMock->shouldReceive('createUser')->andReturn(new User());
        $userRepo = $this->app->instance(UserRepository::class, $this->userRepoMock);
        $userService = new UserService($userRepo);
        $user = $userService->createUser([]);
        $this->assertInstanceOf(User::class, $user);
    }

    public function testUpdateUser()
    {
        $this->userRepoMock->shouldReceive('updateUser')->andReturn(true);
        $userRepo = $this->app->instance(UserRepository::class, $this->userRepoMock);
        $userService = new UserService($userRepo);
        $user = $userService->updateUser([], 1);
        $this->assertTrue($user);
    }

    public function testListLastCreatedUsers()
    {
        $this->userRepoMock->shouldReceive('listLastCreatedUsers')->andReturn(new Collection());
        $userRepo = $this->app->instance(UserRepository::class, $this->userRepoMock);
        $userService = new UserService($userRepo);
        $users = $userService->listLastCreatedUsers();
        $this->assertInstanceOf(Collection::class, $users);
    }

    public function testDeleteUser()
    {
        $this->userRepoMock->shouldReceive('deleteUser')->andReturn(true);
        $userRepo = $this->app->instance(UserRepository::class, $this->userRepoMock);
        $userService = new UserService($userRepo);
        $user = $userService->deleteUser(1);
        $this->assertTrue($user);
    }

    public function testFindUser()
    {
        $this->userRepoMock->shouldReceive('findUser')->andReturn(new User());
        $userRepo = $this->app->instance(UserRepository::class, $this->userRepoMock);
        $userService = new UserService($userRepo);
        $user = $userService->findUser(1);
        $this->assertInstanceOf(User::class, $user);
    }
}
