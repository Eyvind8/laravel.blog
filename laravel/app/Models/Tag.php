<?php

namespace App\Models;

use App\Models\Interfaces\TagsInterface;
use App\Models\Scopes\TagsActiveScope;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $active
 * @property string $created
 * @property string $update
 */
class Tag extends Model implements TagsInterface
{
    /**
     * @var string
     */
    protected $connection = 'app';

    /**
     * @var string
     */
    protected $table = 'tag';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
        'active',
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TagsActiveScope());
    }
}
