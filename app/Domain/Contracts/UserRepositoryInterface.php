<?php

namespace App\Domain\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function createUser(array $data): User;
    public function updateUser(array $data): bool;
    public function deleteUser(int $id): bool;
    public function findUserById(int $id): User;
    public function listUsers(): Collection;
    public function listAdminUsers(): Collection;
    public function listNonPrivilegedUsers(): Collection;

}
