<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\RepositoryInterfaces\BaseRepositoryInterface;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    // model property on class instances
    protected $model;

    /**
     * @desc: injecting model to base repository
     * @param eloquent $model
     */

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
    * @param null
    * @return collections
    */
    public function all(): Collection
    {
        return $this->model->latest()->get();
    }

    /**
    * @param $data array
    * @return model
    */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
    * @param 1. data array 2. record id
    * @return Model
    */
    public function update(array $data, $id): Model
    {
        $record = $this->model->find($id);
        $record->update($data);
        return $record; 
    }

    /**
    * @param $id (record id)
    * @return boolean
    */
    public function delete($id): bool
    {
        return $this->model->destroy($id);
    }

    /**
    * @param record id
    * @return Model
    */
    public function show($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
    * @param null
    * @return model
    */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
    * @param model
    * @return $this
    */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
    * @param relation names, $id
    * @return models with relations
    */
    public function with($relations,$id): Model
    {
        return $this->model->with($relations)->find($id);
    }
    /**
    * @param null
    * @return attributes (model attributes)
    */
    public function fillables()
    {
        return $this->model->getFillables();
    }
    public function batchInsert($data = array())
    {
        return $this->model->insert($data);
    }

    public function recordsWithPagination($perPage = null, $columns = ['*'], $pageName = 'abc', $page = null, $with=[]): Object
    {
        return $this->model->with($with)->latest()->paginate($perPage , $columns , $pageName , $page);
    }
}