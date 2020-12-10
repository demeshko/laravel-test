<?php


namespace App\Domain\Services;
use App\Domain\Contracts\UserServiceInterface;
use App\Domain\Repositories\UserRepository;

class UserService implements UserServiceInterface
{
    private UserRepository $repo;

    /**
     * UserService constructor.
     * @param UserRepository $repo
     */
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data)
    {
        // TODO: Implement createUser() method.
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createUserTransaction(array $data)
    {
        // TODO: Implement createUserTransaction() method.
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function updateUser(array $data)
    {
        // TODO: Implement updateUser() method.
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id)
    {
        // TODO: Implement deleteUser() method.
    }

    /**
     * @param int $id
     */
    public function findUser(int $id)
    {
        // TODO: Implement findUser() method.
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function listLastCreatedUsers(int $limit = 10)
    {
        // TODO: Implement listLastCreatedUsers() method.
    }
}
