<?php

namespace App\Repository;

interface EloquentRepositoryInterface {

    public function all($columns = ['*']);

    public function paginate($perPage = 15, $columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = ['*']);

    public function findBy($field, $value, $columns = ['*']);

    public function findByAttribute($attribute);

    public function findByAttributes($attribute);

    public function findAllBy($attribute, $value, $columns = ['*']);

    public function findAllNullWith($with = [], $field, $where = []);

    public function findByWith($attribute, $value, $with = [], $columns = ['*']);

    public function getAllWith($with, $where = [], $columns = ['*']);

    public function getAllWithLike($with, $field, $operator, $value, $where = [], $columns = ['*']);

    public function scopeFilters($data = '');

}
