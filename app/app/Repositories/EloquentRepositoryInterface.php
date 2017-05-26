<?php

namespace App\Repositories;

interface EloquentRepositoryInterface
{

    /**
     * Get all
     *
     * @return mixed
     */
    public function getAll();


    /**
     * Get one
     *
     * @param  int $id
     *
     * @param  array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*']);


    /**
     * Get one by
     *
     * @param  string $field
     *
     * @param  string $value
     *
     * @param  array  $columns
     *
     * @return mixed
     */
    public function findBy($field, $value, $columns = ['*']);


    /**
     * Create
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);


    /**
     * Update
     *
     * @param       $id
     * @param array $attributes
     *
     * @return mixed
     */
    public function update($id, array $attributes);


    /**
     * Delete
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);
}
