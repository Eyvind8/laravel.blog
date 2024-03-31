<?php

namespace App\Repositories;

use App\Component\BaseRepository;
use App\Models\ItemsParse;

final class ItemsParseRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return ItemsParse::class;
    }

}
