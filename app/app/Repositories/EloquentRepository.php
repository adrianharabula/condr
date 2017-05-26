<?php

namespace App\Repositories;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


abstract class EloquentRepository implements EloquentRepositoryInterface
{

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;


    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        app()->bindMethod($this->getModel(), $this->setModel());
    }


    /**
     * get model
     * @return string
     */
    abstract function getModel();



    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make($this->getModel());
        if (! $this->_model instanceof Model) {
            throw new \Exception("Class {$this->$this->_model } must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
    }


    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->_model->all();
    }


    /**
     * Get one
     *
     * @param       $id
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $result = $this->_model->find($id, $columns);

        return $result;
    }


    /**
     * Get one by
     *
     * @param string $attribute
     *
     * @param string $value
     *
     * @param array  $columns
     *
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = ['*'])
    {
        $result = $this->_model->where($attribute, '=', $value)->first($columns);

        return $result;
    }


    /**
     * Create
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }


    /**
     * Update
     *
     * @param       $id
     * @param array $attributes
     *
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);

            return $result;
        }

        return false;
    }


    /**
     * Update entity
     *
     * @param       $_model
     * @param array $attributes
     *
     * @param array $except
     *
     * @return bool|mixed
     */
    public function updateEntity($_model, array $attributes, array $except = null)
    {
        if ($_model) {
            $_model->update(array_except($attributes, $except));

            return $_model;
        }

        return false;
    }


    /**
     * Delete
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
