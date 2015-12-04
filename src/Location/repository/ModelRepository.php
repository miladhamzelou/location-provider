<?php
/**
 * Created by PhpStorm.
 * User: masoud
 * Date: 11/1/15
 * Time: 9:11 AM
 */

namespace Mabna\Location\repository;


class ModelRepository extends Repository
{

    public $model;

    function __construct($model)
    {
        $model = new $model();
        $this->model = $model;
        $this->model();
    }

    function model()
    {
        return $this->model ;
    }
}