<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property int $item_id
 * @property int $tag_id
 */
class ItemTag extends Model
{
    /**
     * @var string
     */
    protected $connection = 'app';

    /**
     * @var string
     */
    protected $table = 'item_tag'; // Указываем имя таблицы, если оно отличается от соглашения Eloquent

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'item_id',
        'tag_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}
