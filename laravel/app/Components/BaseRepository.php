<?php

namespace App\Components;

use App\Component\Pagination\Filter;
use App\Component\Pagination\QueryBuilder;
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
