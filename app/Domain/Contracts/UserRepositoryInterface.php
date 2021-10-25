<?php

namespace App\Domain\Contracts;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    /**
     * @param int $id
     * @return User
     */
    public function findUser(int $id): User;

    /**
     * @return Collection
     */
    public function listUsers(): Collection;

    /**
     * @return Collection
     */
    public function listAdminUsers(): Collection;

    /**
     * @return Collection
     */
    public function listNonPrivilegedUsers(): Collection;

    /**
     * @param int $limit
     * @return Collection
     */
    public function listLastCreatedUsers(int $limit = 10): Collection;

    /**
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User;

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function createUserTransaction(array $data, int $id);

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function updateUser(array $data, int $id): bool;

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id);
}
