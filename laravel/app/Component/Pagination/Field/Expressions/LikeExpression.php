<?php

namespace App\Component\Pagination\Field\Expressions;

use Illuminate\Database\Query\Builder;

/**
 * Class LikeExpression
 * @package App\Component\Pagination\Field\Expressions
 */
final class LikeExpression extends AbstractExpression
{
    /**
     *
     */
    public const NAME = 'like';

    /**
     * @param string $groupExpression
     * @param Builder $builder
     * @param string $name
     * @param mixed $value
     * @param string $dataType
     * @return Builder
     */
    public function build(string $groupExpression, Builder $builder, &$name, &$value, &$dataType): Builder
    {
        $where = [$name, 'like', '%' . $this->dataTypeFabric->create($value, $dataType) . '%'];

        return $groupExpression === 'and' ? $builder->where(...$where) : $builder->orWhere(...$where);
    }
}
