<?php

namespace App\Component\Pagination;

use App\Models\Tag;
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
            $tag = Tag::find($tagId);

            if ($tag) {
                $tags = Tag::where('parent_id', $tagId)->pluck('id')->toArray();

                $this->builder = $this->builder->where(function ($query) use ($tagId, $tags) {
                    $query->orWhereExists(function ($subquery) use ($tagId) {
                        $subquery->select(DB::raw(1))
                            ->from('item_tag')
                            ->whereColumn('item_tag.item_id', 'item.id')
                            ->where('item_tag.tag_id', $tagId);
                    });

                    if (!empty($tags)) {
                        $query->orWhereExists(function ($subquery) use ($tags) {
                            $subquery->select(DB::raw(1))
                                ->from('item_tag')
                                ->whereColumn('item_tag.item_id', 'item.id')
                                ->whereIn('item_tag.tag_id', $tags);
                        });
                    }
                });
            }
        }

        if ($this->filter->getSearch()) {
            $searchQuery = $this->filter->getSearch();
            $tagsBySearch = [];

            $tagId = Tag::where('name', $searchQuery)->pluck('id')->toArray();

            if ($tagId) {
                $tagsWithParent = Tag::where('parent_id', $tagId)->pluck('id')->toArray();
                $tagsBySearch = array_merge([$tagId], $tagsWithParent);
            }

            $this->builder = $this->builder->where(function ($query) use ($searchQuery, $tagsBySearch) {
                $query->orWhereRaw(
                    "MATCH (`content`) AGAINST (? IN BOOLEAN MODE)", [$searchQuery]
                );

                $query->orWhereExists(function ($subquery) use ($tagsBySearch) {
                    $subquery->select(DB::raw(1))
                        ->from('item_tag')
                        ->join('tag', 'item_tag.tag_id', '=', 'tag.id')
                        ->whereColumn('item_tag.item_id', 'item.id')
                        ->whereIn('tag.id', $tagsBySearch);
                });
            });
        }


//        $sql = $this->builder->toSql();
//        $bindings = $this->builder->getBindings();

//        dump($sql);
//        dd($bindings);

        return new Pagination($this->builder, $this->filter);
    }
}
