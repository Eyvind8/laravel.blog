<?php

namespace App\Component\Pagination;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class Pagination
 * @package App\Component\Pagination
 */
class Pagination implements \JsonSerializable, \Iterator
{
    /**
     * @var Builder
     */
    private $builder;

    /**
     * @var array|null
     */
    private $current;

    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var Filter
     */
    private Filter $filter;

    /**
     * @param Builder $builder
     * @param int $offset
     * @param int $limit
     * @param string $sortField
     * @param string $sortDirection
     */
    public function __construct(Builder $builder, Filter $filter)
    {
        $this->builder = $builder;
        $this->offset = $filter->getOffset();
        $this->limit = $filter->getLimit();
        $this->filter = $filter;
        $this->next();
    }

    /**
     * @return array|null
     */
    public function current(): ?array
    {
        return $this->current;
    }

    /**
     * @return array|null
     */
    public function next(): ?array
    {
        $listBuilder = clone $this->builder;
        $this->current = $listBuilder->offset($this->offset)->limit($this->limit)->get()->all();

        if (!$this->total) {
            $builder = clone $this->builder;
            $this->total = $builder->count();
        }

        $this->offset += $this->limit;

        return $this->current();
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->offset - $this->limit;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return (bool)$this->current;
    }

    /**
     *
     */
    public function rewind(): void
    {
        // TODO: Implement rewind() method.
    }

    /**
     * @return array = [
     *      'list' => [],
     *      'total' => '(int)'
     * ]
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @return array = [
     *      'list' => [],
     *      'total' => '(int)'
     * ]
     */
    public function toArray(): array
    {
        return [
            'total_pages' => (int)ceil($this->total / $this->limit),
            'current_page' => (int)ceil($this->offset / $this->limit),
            'total' => $this->total,
            'limit' => $this->limit,
            'sort' => $this->filter->getSortField(),
            'sort_dir' => $this->filter->getSortDirection(),
            'search' => $this->filter->getSearch(),
            'tag_id' => $this->filter->getTagId(),
            'list' => $this->current,
        ];
    }

    /**
     * @return \Generator
     */
    public function generator(): \Generator
    {
        foreach ($this as $items) {
            foreach ($items as $item) {
                yield $item;
            }
        }
    }
}
