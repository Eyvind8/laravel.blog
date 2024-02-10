<?php

namespace App\Repositories;

use App\Component\BaseRepository;
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
            ->pluck('tag.id')
            ->toArray();
    }
}
