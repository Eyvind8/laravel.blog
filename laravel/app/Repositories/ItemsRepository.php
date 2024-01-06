<?php

namespace App\Repositories;

use App\Component\BaseRepository;
use App\Models\Items;
use Illuminate\Support\Facades\DB;

final class ItemsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Items::class;
    }

    public function getTagsForItem($itemId)
    {
        return DB::table('item_tag')
            ->join('tag', 'item_tag.tag_id', '=', 'tag.id')
            ->where('item_tag.item_id', $itemId)
            ->select('tag.id', 'tag.name')
            ->orderBy('tag.name')
            ->get();
    }
}
