<?php

namespace App\Repositories;

use App\Component\BaseRepository;
use App\Models\Tag;

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
}
