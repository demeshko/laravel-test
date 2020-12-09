<?php

namespace App\Domain\Repositories;

use App\Models\User;

use App\Domain\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

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
        $data['password'] = Hash::make($data['password']);
        return $this->create($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateUser(array $data): bool
    {
        return $this->update($data);
    }

    /**
     * @throws \Exception
     */
    public function deleteUser()
    {
       return $this->delete();
    }

    /**
     * @param int $id
     * @return User
     */
    public function findUserById(int $id): User
    {
        return $this->find($id);
    }

    /**
     * @return Collection
     */
    public function listUsers(): Collection
    {
        return $this->all();
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
