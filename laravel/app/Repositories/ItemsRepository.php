<?php

namespace App\Repositories;

use App\Component\BaseRepository;
use App\Models\Items;

final class ItemsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Items::class;
    }
}
