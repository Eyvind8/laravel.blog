<?php

namespace App\Repositories\Basis;

use App\Components\BaseRepository;
use App\Models\Basis\Items;

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
