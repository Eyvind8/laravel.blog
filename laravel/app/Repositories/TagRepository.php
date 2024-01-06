<?php

namespace App\Repositories;

use App\Component\BaseRepository;
use App\Models\ItemTag;

final class TagRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return ItemTag::class;
    }
}
