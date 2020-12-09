<?php

namespace App\Domain\Repositories;

use App\Models\User;
use App\Domain\Abstracts\BaseRepository;
use App\Domain\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        // TODO: Implement createUser() method.
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateUser(array $data): bool
    {
        // TODO: Implement updateUser() method.
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteUser(int $id): bool
    {
        // TODO: Implement deleteUser() method.
    }

    /**
     * @param int $id
     * @return User
     */
    public function findUserById(int $id): User
    {
        // TODO: Implement findUserById() method.
    }

    /**
     * @return Collection
     */
    public function listUsers(): Collection
    {
        // TODO: Implement listUsers() method.
    }

    /**
     * @return Collection
     */
    public function listAdminUsers(): Collection
    {
        // TODO: Implement listAdminUsers() method.
    }

    /**
     * @return Collection
     */
    public function listNonPrivilegedUsers(): Collection
    {
        // TODO: Implement listNonPrivilegedUsers() method.
    }
}
