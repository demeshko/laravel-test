<?php

namespace App\Domain\Repositories;

use App\Models\User;

use App\Domain\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
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
     * @param int|null $id
     * @return bool
     */
    public function updateUser(array $data, int $id): bool
    {
        return $this->update($data, $id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteUser(int $id = null): bool
    {
       if(!is_null($id)) {
           return $this->delete($id);
       }
       return $this->model->delete();
    }

    /**
     * @param int $id
     * @return User
     */
    public function findUser(int $id): User
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
     * @param int $limit
     * @return Builder[]|Collection
     */
    public function listLastCreatedUsers(int $limit = 10): Collection
    {
        return User::with('transactions')
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function createUserTransaction(array $data, int $id)
    {
        $user = $this->findUser($id);
        return $user->transactions()->create($data);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAdminUsers(): \Illuminate\Support\Collection
    {
        return $this->model->where('is_admin', true)->get();
    }

    /**
     * @return Collection
     */
    public function listNonPrivilegedUsers(): Collection
    {
        return $this->model->where('is_admin', false)->get();
    }
}
