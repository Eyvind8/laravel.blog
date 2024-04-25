<?php

namespace App\Component\Pagination;

use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Filter
 * @package App\Component\Pagination
 */
class Filter
{
    /**
     *
     */
    public const DEFAULT_LIMIT = 10;

    /**
     *
     */
    public const DEFAULT_OFFSET = 0;

    /**
     *
     */
    public const SORT_DIRECTION_ASC = 'asc';

    /**
     *
     */
    public const SORT_DIRECTION_DESC = 'desc';

    /**
     *
     */
    public const EXPRESSION_TYPE_GROUP = 'group';

    /**
     *
     */
    public const EXPRESSION_TYPE_FIELD = 'field';

    /**
     *
     */
    public const GROUP_EXPRESSION_AND = 'and';

    /**
     *
     */
    public const GROUP_EXPRESSION_OR = 'or';

    /**
     *
     */
    public const FIELD_EXPRESSION_EQ = 'eq';

    /**
     *
     */
    public const FIELD_EXPRESSION_NEQ = 'neq';

    /**
     *
     */
    public const FIELD_EXPRESSION_GT = 'gt';

    /**
     *
     */
    public const FIELD_EXPRESSION_GTE = 'gte';

    /**
     *
     */
    public const FIELD_EXPRESSION_LT = 'lt';

    /**
     *
     */
    public const FIELD_EXPRESSION_LTE = 'lte';

    /**
     *
     */
    public const FIELD_EXPRESSION_LIKE = 'like';

    /**
     *
     */
    public const FIELD_TYPE_DATE = 'date';

    /**
     * @var int|null
     */
    private $tagId;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var string
     */
    private $sortField;

    /**
     * @var string
     */
    private $sortDirection;

    /**
     * @var array|null
     */
    private $filter;

    /**
     * @var mixed|null
     */
    private mixed $search;

    /**
     * Filter constructor.
     * @param array $data = [
     *      'page' => '(int)',
     *      'limit' => '!(int)',
     *      'offset' => '!(int)',
     *      'sortField' => '!(string)',
     *      'sortDirection' => '!(string)',
     *      'filter' => ![
     *          'type' => 'group',
     *          'expression' => '!(string)',
     *          'fields' => [
     *              ['type' => 'field', 'name' => '(string)', 'expression' => '(string)', 'value' => '(mixed)'],
     *              //...
     *              [
     *                  'type' => 'group', 'expression' => '(string)', 'fields' => [
     *                      //...
     *                  ]
     *              ],
     *              //...
     *          ]
     *      ]
     * ]
     */
    public function __construct(array $data)
    {
        $this->limit = isset($data['limit']) && filter_var($data['limit'], FILTER_VALIDATE_INT) && $data['limit'] > 0
            ? (int)$data['limit']
            : self::DEFAULT_LIMIT;

        if (!empty($data['page']) && $page = (int)$data['page']) {
            $this->offset = ($page - 1) * $this->limit;
        } else {
            $this->offset = isset($data['offset']) && filter_var($data['offset'], FILTER_VALIDATE_INT) !== false && $data['offset'] >= 0
                ? (int)$data['offset']
                : self::DEFAULT_OFFSET;
        }

        $this->sortField = isset($data['sortField']) && filter_var($data['sortField'], FILTER_VALIDATE_REGEXP,
            ['options' => ['regexp' => '/[A-Za-z0-9_]{1,}/']]
        )
            ? $data['sortField']
            : null;

        $this->sortDirection = isset($data['sortDirection']) && \in_array($data['sortDirection'], [self::SORT_DIRECTION_ASC, self::SORT_DIRECTION_DESC])
            ? $data['sortDirection']
            : self::SORT_DIRECTION_DESC;

        if (isset($data['filter']) && \is_array($data['filter']) && $data['filter']) {
            $this->filter = $data['filter'];
        } elseif (isset($data['filter']) && \is_string($data['filter'])) {
            $this->filter = \json_decode($data['filter'], true) ?: null;
        }

        $this->tagId = !empty($data['tag']) ? (int)$data['tag'] : null;
        $this->search = $data['search'] ?? null;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return string|null
     */
    public function getSortDirection(): ?string
    {
        return $this->getSortField() ? $this->sortDirection : null;
    }

    /**
     * @return string|null
     */
    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    public function getTagId(): ?int
    {
        return $this->tagId;
    }

    public function getSearch(): ?string
    {
        if (!$this->search || mb_strlen($this->search) < 4) {
            return null;
        }

        return $this->search;
    }

    /**
     * @return Closure|null
     */
    public function getFilter(): ?Closure
    {
        return $this->filter ? $this->buildFilter($this->filter) : null;
    }

    /**
     * @param array $data
     * @return Closure
     */
    private function buildFilter(array $data): Closure
    {
        return function (Builder $builder) use ($data) {
            $this->setGroupExpression($builder, $data);
        };
    }

    /**
     * @param Builder $builder
     * @param $data
     */
    private function setGroupExpression(Builder $builder, $data): void
    {
        if (!\in_array($data['expression'], [
            self::GROUP_EXPRESSION_AND,
            self::GROUP_EXPRESSION_OR
        ])) {
            return;
        }

        if ($data['expression'] === self::GROUP_EXPRESSION_AND) {
            foreach ($data['fields'] as $key => $field) {
                if ($field['type'] === self::EXPRESSION_TYPE_FIELD) {
                    $builder = $this->getFieldExpression($builder, $field, self::GROUP_EXPRESSION_AND);
                }
                if ($field['type'] === self::EXPRESSION_TYPE_GROUP) {
                    $builder = $builder->where($this->buildFilter($field));
                }
            }

            return;
        }

        foreach ($data['fields'] as $key => $field) {
            if ($key === 0) {
                if ($field['type'] === self::EXPRESSION_TYPE_FIELD) {
                    $builder = $this->getFieldExpression($builder, $field, self::GROUP_EXPRESSION_AND);
                }
                if ($field['type'] === self::EXPRESSION_TYPE_GROUP) {
                    $builder = $builder->where($this->buildFilter($field));
                }
            } else {
                if ($field['type'] === self::EXPRESSION_TYPE_FIELD) {
                    $this->getFieldExpression($builder, $field, self::GROUP_EXPRESSION_OR);
                }
                if ($field['type'] === self::EXPRESSION_TYPE_GROUP) {
                    $builder = $builder->orWhere($this->buildFilter($field));
                }
            }
        }
    }

    /**
     * @param Builder $builder
     * @param $field
     * @param string $type
     * @return Builder
     */
    /**
     * @param Builder $builder
     * @param $field
     * @param string $type
     * @return Builder
     */
    private function getFieldExpression(Builder $builder, $field, string $type): Builder
    {
        $method = $type === self::GROUP_EXPRESSION_AND ? 'where' : 'orWhere';

        $fieldName = $field['name'];
        $fieldType = $field['dataType'] ?? null;
        $fieldExpression = $field['expression'];
        $fieldValue = $this->prepareValue($field['value'], $fieldExpression, $fieldType);

        switch ($field['expression']) {
            case self::FIELD_EXPRESSION_EQ:
                return $builder->$method($fieldName, '=', $fieldValue);
            case self::FIELD_EXPRESSION_NEQ:
                return $builder->$method($fieldName, '!=', $fieldValue);
            case self::FIELD_EXPRESSION_GT:
                return $builder->$method($fieldName, '>', $fieldValue);
            case self::FIELD_EXPRESSION_GTE:
                return $builder->$method($fieldName, '>=', $fieldValue);
            case self::FIELD_EXPRESSION_LT:
                return $builder->$method($fieldName, '<', $fieldValue);
            case self::FIELD_EXPRESSION_LTE:
                return $builder->$method($fieldName, '<=', $fieldValue);
            case self::FIELD_EXPRESSION_LIKE:
                return $builder->$method($fieldName, 'like', '%' . $fieldValue . '%');
            default:
                return $builder;
        }
    }


    /**
     * @param $value
     * @param $fieldExpression
     * @param string|null $type
     * @return Carbon|false|mixed|void
     */
    private function prepareValue($value, $fieldExpression, ?string $type)
    {
        if ($type !== self::FIELD_TYPE_DATE) {
            return $value;
        }

        switch ($fieldExpression) {
            case self::FIELD_EXPRESSION_GTE:
                return Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
            case self::FIELD_EXPRESSION_LTE:
                return Carbon::createFromFormat('Y-m-d', $value)->endOfDay();
            default:
                return Carbon::createFromFormat('Y-m-d', $value);
        }
    }
}
