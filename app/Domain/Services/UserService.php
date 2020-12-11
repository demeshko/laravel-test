<?php


namespace App\Domain\Services;
use App\Domain\Contracts\UserServiceInterface;
use App\Domain\Repositories\UserRepository;
use App\Models\User;

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
        return $this->repo->createUser($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function createUserTransaction(array $data, int $id)
    {
        return $this->repo->createUserTransaction($data, $id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function updateUser(array $data, int $id)
    {
        return $this->repo->updateUser($data, $id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id)
    {
        return $this->repo->deleteUser($id);
    }

    /**
     * @param int $id
     */
    public function findUser(int $id): User
    {
        return $this->repo->findUser($id);
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function listLastCreatedUsers(int $limit = 10)
    {
        return $this->repo->listLastCreatedUsers($limit);
    }
}
