<?php

namespace App\Domain\Repositories;

use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_list_the_users()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'example@example.com',
            'password' => 'secret'
        ];

        $user = User::factory()->create($data);

        $repo = new UserRepository(new User);
        $users = $repo->listUsers();

        $users->each(function (User $item) use ($user) {
            $this->assertEquals($user->name, $item->name);
            $this->assertEquals($user->email, $item->email);
        });
    }

    /** @test */
    public function can_delete_the_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'example@example.com',
            'password' => 'secret'
        ];

        $user = User::factory()->create($data);

        $repo = new UserRepository($user);
        $repo->deleteUser();

        $this->assertDeleted($user);
    }

    /** @test */
    public function can_update_the_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'example@example.com',
            'password' => 'secret'
        ];

        $user = User::factory()->create($data);

        $update = [
            'name' => 'Test User2'
        ];

        $repo = new UserRepository($user);
        $updated = $repo->updateUser($update, $user->id);

        $this->assertTrue($updated);
    }

    /** @test */
    public function can_show_the_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'example@example.com',
            'password' => 'secret'
        ];

        $user = User::factory()->create($data);

        $repo = new UserRepository(new User);
        $foundedUser =$repo->findUser($user->id);

        $this->assertInstanceOf(User::class,  $foundedUser);
        $this->assertEquals($user->name,  $foundedUser->name);
        $this->assertEquals($user->email,  $foundedUser->email);
    }

    /** @test */
    public function can_create_a_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'example@example.com',
            'password' => 'secret'
        ];

        $repo = new UserRepository(new User);
        $user = $repo->createUser($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
    }

    /** @test */
    public function can_list_the_admin_users()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'example@example.com',
            'password' => 'secret',
            'is_admin' => true
        ];

        $user = User::factory()->create($data);

        $repo = new UserRepository(new User);
        $users = $repo->listAdminUsers();

        $users->each(function (User $item) use ($user) {
            $this->assertEquals($user->is_admin, $item->is_admin);
        });
    }

    /** @test */
    public function can_list_the_non_privileged_users()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'example@example.com',
            'password' => 'secret',
            'is_admin' => false
        ];

        $user = User::factory()->create($data);

        $repo = new UserRepository(new User);
        $users = $repo->listNonPrivilegedUsers();

        $users->each(function (User $item) use ($user) {
            $this->assertIsBool($item->is_admin);
            $this->assertEquals($user->is_admin, $item->is_admin);
        });
    }
}
