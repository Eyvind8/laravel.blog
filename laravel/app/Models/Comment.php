<?php

namespace App\Models;

use App\Models\Interfaces\CommentInterface;
use App\Models\Scopes\CommentActiveScope;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property int $item_id
 * @property int $user_id
 * @property string $text
 * @property int $active
 * @property string $created
 * @property string $update
 */
class Comment extends Model implements CommentInterface
{
    /**
     * @var string
     */
    protected $connection = 'app';

    /**
     * @var string
     */
    protected $table = 'comment';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'item_id',
        'user_id',
        'text',
        'active',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'user_id' => 0,
        'active' => 0,
    ];


    /**
     *
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CommentActiveScope());
    }
}
