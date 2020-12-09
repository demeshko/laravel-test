<?php

namespace App\Domain\Abstracts;

use App\Domain\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool
    {
        // TODO: Implement update() method.
    }

    /**
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all(string $orderBy = 'id', string $sortBy = 'asc')
    {
        // TODO: Implement all() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        // TODO: Implement delete() method.
    }
}
