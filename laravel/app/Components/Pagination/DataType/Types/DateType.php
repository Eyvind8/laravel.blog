<?php

namespace App\Component\Pagination\DataType\Types;

use Carbon\Carbon;

/**
 * Class DateType
 * @package App\Component\Pagination\DataType\Types
 */
class DateType extends AbstractType
{
    /**
     * @param string $value
     * @return \DateTime
     */
    public function create($value): \DateTime
    {
        return Carbon::createFromFormat('Y-m-d', $value);
    }
}
