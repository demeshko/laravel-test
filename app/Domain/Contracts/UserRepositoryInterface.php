<?php

namespace App\Domain\Contracts;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function findUser(int $id): User;
    public function listUsers(): Collection;
    public function listAdminUsers(): Collection;
    public function listNonPrivilegedUsers(): Collection;
    public function listLastCreatedUsers(int $limit = 10): Collection;
    public function createUser(array $data): User;
    public function createUserTransaction(array $data, int $id);
    public function updateUser(array $data, int $id): bool;
    public function deleteUser(int $id);
}
