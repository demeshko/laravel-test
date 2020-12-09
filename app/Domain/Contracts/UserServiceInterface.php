<?php


namespace App\Domain\Contracts;


interface UserServiceInterface
{
    public function createUser();
    public function createUserTransaction();
    public function listLastCreatedUsers(int $limit = 10);
}
