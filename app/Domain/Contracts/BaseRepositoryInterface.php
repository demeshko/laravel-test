<?php


namespace App\Domain\Contracts;


use Illuminate\Database\Eloquent\Collection;

interface BaseRepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, int $id) : bool;

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
