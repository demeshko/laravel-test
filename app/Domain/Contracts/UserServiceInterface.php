<?php


namespace App\Domain\Contracts;


interface UserServiceInterface
{
    public function createUser(array $data);
    public function createUserTransaction(array $data);
    public function updateUser(array $data);
    public function deleteUser(int $id);
    public function findUser(int $id);
    public function listLastCreatedUsers(int $limit = 10);
}
