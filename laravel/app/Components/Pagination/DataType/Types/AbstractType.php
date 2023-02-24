<?php

namespace App\Component\Pagination\DataType\Types;

/**
 * Class AbstractType
 * @package App\Component\Pagination\DataType\Types
 */
abstract class AbstractType
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    abstract public function create($value);
}
