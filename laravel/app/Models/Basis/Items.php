<?php

namespace App\Models\Basis;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    /**
     * @var string
     */
    protected $connection = 'app';

    /**
     * @var string
     */
    protected $table = 'items';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'content',
        'likes',
    ];
}
