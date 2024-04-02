<?php

namespace App\Models;

use App\Models\Interfaces\ItemsParseInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemsParse
 *
 * Class ItemParse
 *
 * @package App\Models
 * @property int $id
 * @property string $content
 * @property string $content_ua
 * @property int $status
 * @property \Illuminate\Support\Carbon $publication_date
 * @property \Illuminate\Support\Carbon $created
 * @property \Illuminate\Support\Carbon $updated
 */
class ItemsParse extends Model implements ItemsParseInterface
{
    /**
     * @var string
     */
    protected $connection = 'app';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_parse';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'content_ua', 'status', 'publication_date'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'updated', 'publication_date'];

    /**
     * Get the name of the "created at" column.
     *
     * @return string
     */
    const CREATED_AT = 'created';

    /**
     * Get the name of the "updated at" column.
     *
     * @return string
     */
    const UPDATED_AT = 'updated';
}
