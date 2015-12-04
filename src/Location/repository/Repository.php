<?php
/**
 * Created by PhpStorm.
 * User: masoud
 * Date: 11/1/15
 * Time: 11:41 AM
 */

namespace Mabna\Location\repository;



use Illuminate\Database\Capsule\Manager;


abstract class Repository implements RepositoryInteface
{

    public $model;


    abstract function model();


    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }


    public function update(array $data,$id, $attribute="id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $child = null, $columns = array('*') )
    {
        $result = null;
        if($child !== null)
        {
            $result = $this->model->find($id, $columns)->child()->get();
        }
        else
            $result = $this->model->find($id, $columns);

        return $result;
    }

    public function findBy($attribute, $value,$columns = array('*'))
    {

        return $result = $this->model->where($attribute, '=', $value)->get();
    }

    public function findByQuery($query)
    {
        return $this->model->raw($query);
    }

    public function findIn($attributes, $values)
    {
        return $this->model->whereIn($attributes , $values)->get();
    }

    public function select($query)
    {
        return Manager::select($query);
    }


}