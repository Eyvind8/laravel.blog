<?php

namespace App\Component\Pagination;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Class QueryBuilder
 * @package App\Component\Pagination
 */
class QueryBuilder
{
    /**
     * @var Builder
     */
    protected Builder $builder;

    /**
     * @var Filter
     */
    protected Filter $filter;

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

        if ($this->filter->getTagId()) {
            $tagId = $this->filter->getTagId();
            $this->builder = $this->builder->whereExists(function ($query) use ($tagId) {
                $query->select(DB::raw(1))
                    ->from('item_tag')
                    ->whereColumn('item_tag.item_id', 'item.id')
                    ->where('item_tag.tag_id', $tagId);
            });
        }

        if ($this->filter->getSearch()) {
            $searchQuery = $this->filter->getSearch();
            $this->builder = $this->builder->whereRaw(
                "MATCH (`content`) AGAINST (? IN BOOLEAN MODE)", [$searchQuery]
            );
        }

        return new Pagination($this->builder, $this->filter->getOffset(), $this->filter->getLimit());
    }
}
