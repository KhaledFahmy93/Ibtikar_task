<?php

namespace App\Repositories;

use App\Factories\ModelFactory;
use App\Repository\EloquentRepositoryInterface;

abstract class EloquentRepository implements EloquentRepositoryInterface
{
    protected $model;
    protected $modelFactory;

    public function __construct(ModelFactory $modelFactory)
    {
        $this->modelFactory = $modelFactory;
        $this->setModel();
    }

    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 15, $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function updateOrCreate(array $data , array $data2)
    {
        return $this->model->updateOrCreate($data , $data2);
    }

    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function limit($limit)
    {
        return $this->model->limit($limit)->get();
    }

    public function order($field, $sort){
        return $this->model->orderBy($field, $sort);
    }

    public function count()
    {
        return $this->model->count();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($attribute, $value, $columns = ['*'])
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
    public function findByAttribute($attribute)
    {
        return $this->model->where($attribute)->first();
    }
    public function findByAttributes($attribute)
    {
        return $this->model->where($attribute)->get();
    }

    public function findAllBy($attribute, $value, $columns = ['*'])
    {
        return $this->model->where($attribute, '=', $value)->get($columns);
    }

    public function findAllNullWith($with = [], $field, $where = []) {
        return $this->model->whereNull($field)->with($with)->where($where)->get();
    }

    public function findByWith($attribute, $value, $with = [], $columns = ['*'])
    {
        return $this->model->select($columns)->where($attribute, $value)->with($with)->first();
    }

    public function getAllWith($with, $where = [], $columns = ['*'])
    {
        return $this->model->select($columns)->with($with)->where($where)->get();
    }

    public function getAllWithAndOrder($with, $where = [], $field, $sort,$columns = ['*'])
    {
        return $this->model->select($columns)->where($where)->orderBy($field,$sort)->with($with)->get();
    }

    public function getAllWhereInOrder($key, $attribute,$order )
    {
        return $this->model->whereIn($key, $attribute)->orderBy($order)->paginate(10);
    }

    public function getAllWithLike($with, $field, $operator, $value, $where = [], $columns = ['*'])
    {
        return $this->model->select($columns)->with($with)->where($field, $operator, $value)->where($where)->get();
    }

    public function scopeFilters($data = '') {
        return $this->model->filter($data)->get();
    }

    private function setModel()
    {
        $this->model = $this->modelFactory->create($this->getModelName());
    }

    public function getModel()
    {
        return $this->model;
    }

    public function whereJoinCount($where,$table, $firstParam, $operator, $secondParam) {
        return $this->model->where($where)->join($table, $firstParam, $operator, $secondParam)->count();
    }

    public function whereJoin($where,$table, $firstParam, $operator, $secondParam) {
        return $this->model->where($where)->join($table, $firstParam, $operator, $secondParam)->get();
    }
}
