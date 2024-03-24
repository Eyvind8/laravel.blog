<?php

namespace App\Repositories;

use App\Component\BaseRepository;
use App\Models\ItemTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

final class TagRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Tag::class;
    }

    /**
     * @param string $tagName
     * @return int
     */
    public function findOrCreateTag(string $tagName): int
    {
        $tagName = mb_strtolower($tagName, 'UTF-8');
        $tag = Tag::where('name', $tagName)->first();

        if ($tag) {
            return $tag->id;
        }

        $newTag = Tag::create(['name' => $tagName, 'active' => 1]);

        return $newTag->id;
    }

    /**
     * Получить теги, которые не связаны с items
     *
     * @param array $tagIds
     * @return array
     */
    public function getUnusedTags(array $tagIds): array
    {
        return DB::table('tag')
            ->leftJoin('item_tag', 'tag.id', '=', 'item_tag.tag_id')
            ->whereIn('tag.id', $tagIds)
            ->whereNull('item_tag.tag_id')
            ->whereNull('tag.parent_id')
            ->pluck('tag.id')
            ->toArray();
    }

    public function getActiveRecordsCount($tagId)
    {
        return ItemTag::where('tag_id', $tagId)
            ->join('item', 'item_tag.item_id', '=', 'item.id')
            ->where('item.status', '=', Tag::STATUS_ACTIVE)
            ->count();
    }

    public function getTotalRecordsCount($tagId)
    {
        return ItemTag::where('tag_id', $tagId)
            ->join('item', 'item_tag.item_id', '=', 'item.id')
            ->count();
    }
}
