<?php

namespace App\Models;

use App\Models\Interfaces\ItemsInterface;
use App\Models\Scopes\ItemsActiveScope;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Items
 *
 * @property int $id
 * @property int $status
 * @property string|null $title
 * @property string $content
 * @property int $likes
 * @property string $created
 * @property string $update
 * @property int $type
 */
class Items extends Model implements ItemsInterface
{
    /**
     * @var string
     */
    protected $connection = 'app';

    /**
     * @var string
     */
    protected $table = 'item';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'status',
        'title',
        'content',
        'likes',
        'created',
        'updated',
        'type'
    ];

    /**
     * @var array
     */
    private array $tags;

    /**
     * @param array $tags
     * @return void
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        //static::addGlobalScope(new ItemsActiveScope());

        /**
         * static::addGlobalScope('active', function (Builder $builder) {
         * $builder->where('status', 1);
         * });
         */
    }
}
