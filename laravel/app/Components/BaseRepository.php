<?php

namespace App\Components;

use App\Component\Pagination\Filter;
use App\Component\Pagination\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Component
 */
abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Array of global scopes
     * @var array
     */
    protected $globalScopes = [];

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->model = app()->make($this->model());
        $this->setGlobalScopes();
    }

    /**
     * @return string
     */
    abstract public function model(): string;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->model->newQuery();
    }

    /**
     * @param array $columns
     *
     * @return Collection|static[]
     */
    public function all(array $columns = ['*'])
    {
        return $this->model::all($columns);
    }

    /**
     * @param array $attributes
     * @return $this|Model
     */
    public function create(array $attributes)
    {
        return $this->query()->create($attributes);
    }

    /**
     * @param $id
     * @param array $attributes
     * @param array $options
     *
     * @return bool
     */
    public function update($id, array $attributes = [], array $options = [])
    {
        return $this->get($id)->update($attributes, $options);
    }

    /**
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        return $this->model::destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     *
     * @return Collection|Model|static|static[]
     */
    public function get($id, array $columns = ['*'])
    {
        return $this->query()->find($id, $columns);
    }

    /**
     * @param $id
     * @param array $columns
     * @return Collection|Model|null|static|static[]
     */
    public function getWithoutGlobalScopes($id, array $columns = ['*'])
    {
        return $this->query()->withoutGlobalScopes()->find($id, $columns);
    }

    /**
     * @param Filter $filter
     * @return QueryBuilder
     */
    public function filter(Filter $filter): QueryBuilder
    {
        return new QueryBuilder($this->query(), $filter);
    }

    /**
     * Add global scopes to model
     *
     * @return void
     */
    private function setGlobalScopes()
    {
        foreach ($this->globalScopes as $scope) {
            $this->model::addGlobalScope(new $scope());
        }
    }
}
