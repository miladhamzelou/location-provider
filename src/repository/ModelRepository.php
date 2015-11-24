<?php
/**
 * Created by PhpStorm.
 * User: milad
 * Date: 11/1/15
 * Time: 9:11 AM
 */

namespace Mabna\Location\repository;

use Prettus\Repository\Eloquent\BaseRepository;

class ModelRepository extends BaseRepository
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