<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


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

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('status', 1);
        });
    }
}
