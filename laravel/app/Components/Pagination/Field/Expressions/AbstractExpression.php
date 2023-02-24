<?php

namespace App\Component\Pagination\Field\Expressions;

use App\Component\Pagination\DataType\Fabric;
use Illuminate\Database\Query\Builder;

/**
 * Class AbstractExpression
 * @package App\Component\Pagination\Field\Expressions
 */
abstract class AbstractExpression
{
    /**
     * @var Fabric
     */
    protected $dataTypeFabric;

    /**
     * EqExpression constructor.
     * @param Fabric $dataTypeFabric
     */
    public function __construct(Fabric $dataTypeFabric)
    {
        $this->dataTypeFabric = $dataTypeFabric;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param string $groupExpression
     * @param Builder $builder
     * @param $name
     * @param $value
     * @param $dataType
     * @return Builder
     */
    abstract public function build(string $groupExpression, Builder $builder, &$name, &$value, &$dataType): Builder;
}
