<?php


namespace App\Domain\Contracts;


interface UserServiceInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data);

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function createUserTransaction(array $data, int $id);

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function updateUser(array $data, int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function findUser(int $id);

    /**
     * @param int $limit
     * @return mixed
     */
    public function listLastCreatedUsers(int $limit = 10);
}
