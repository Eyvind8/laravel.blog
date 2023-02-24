<?php

namespace App\Models\Jokes;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jokes
 * @package App\Models\Jokes
 *
 * @property int $id
 * @property string $content
 * @property int $likes
 */
class Jokes extends Model
{
    /**
     * @var string
     */
    protected $connection = 'app';

    /**
     * @var string
     */
    protected $table = 'jokes';

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
