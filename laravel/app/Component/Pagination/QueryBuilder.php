<?php

namespace App\Component\Pagination;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class QueryBuilder
 * @package App\Component\Pagination
 */
class QueryBuilder
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * QueryBuilder constructor.
     * @param Builder $builder
     * @param Filter $filter
     */
    public function __construct(Builder $builder, Filter $filter)
    {
        $this->builder = $builder;
        $this->filter = $filter;
    }

    /**
     * @param \Closure|null $closure
     * @return Pagination
     */
    public function pagination(?\Closure $closure = null): Pagination
    {
        if ($closure !== null) {
            $this->builder = $closure($this->builder);
        }

        if ($this->filter->getFilter()) {
            $this->builder = $this->builder->where($this->filter->getFilter());
        }

        if ($this->filter->getSortField()) {
            $this->builder = $this->builder->orderBy($this->filter->getSortField(), $this->filter->getSortDirection());
        }

        return new Pagination($this->builder, $this->filter->getOffset(), $this->filter->getLimit());
    }
}
