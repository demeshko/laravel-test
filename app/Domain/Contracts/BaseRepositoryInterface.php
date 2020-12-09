<?php


namespace App\Domain\Contracts;


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
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all(string $orderBy = 'id', string $sortBy = 'asc');

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @return bool
     */
    public function delete() : bool;
}
