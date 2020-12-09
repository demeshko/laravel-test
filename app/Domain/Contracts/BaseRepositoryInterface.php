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
     * @return bool
     */
    public function update(array $data) : bool;

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @return bool
     */
    public function delete();
}
