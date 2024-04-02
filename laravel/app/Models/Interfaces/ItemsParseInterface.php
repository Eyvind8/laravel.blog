<?php

namespace App\Models\Interfaces;

interface ItemsParseInterface
{
    /**
     *
     */
    public const STATUS_NEW = 0;

    /**
     * для крона
     */
    public const STATUS_ACTIVE = 1;

    /**
     * уже использавоно, т.е. скопировано в Item
     */
    public const STATUS_USE = 2;

    /**
     *
     */
    public const STATUS_DELETE = 3;
}
