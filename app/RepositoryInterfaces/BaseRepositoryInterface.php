<?php namespace App\RepositoryInterfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
/**
 * Attendance Repository Interface to make repository abstract
 */
interface BaseRepositoryInterface
{
    /**
    * @param null
    * @return collections
    */
    public function all(): Collection;
    /**
    * @param $data array
    * @return Illuminate\Database\Eloquent\Model
    */
    public function create(array $data): Model;

    /**
    * @param 1. data array 2. record id
    * @return Bolean (true/false)
    */
    public function update(array $data, $id): Model;

    /**
    * @param $id (record id)
    * @return boolean
    */
    public function delete($id);
    /**
    * @param record id
    * @return Model
    */
    public function show($id);
    /**
    * @param null
    * @return model
    */
    public function getModel();
     /**
    * @param model
    * @return $this
    */
    public function setModel($model);
    /**
    * @param relation names,$id
    * @return models with relations
    */
    public function with($relations,$id);
    /**
    * @param null
    * @return attributes (model attributes)
    */
    public function fillables();
    /**
     * insert batch data
     * @param: $data Array
     * @return: Mix 
     */
    public function batchInsert($data = array());
    
    // this method is used to fetch records using pagination
    public function recordsWithPagination($perPage = null, $columns = ['*'], $pageName = 'page', $page = null, $with=[]);
}