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
 * @property int $active_records_count
 * @property int $total_records_count
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
        'active_records_count',
        'total_records_count',
    ];

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();
        //static::addGlobalScope(new TagsActiveScope());
    }

    public function children()
    {
        return $this->hasMany(Tag::class, 'parent_id', 'id');
    }
}
