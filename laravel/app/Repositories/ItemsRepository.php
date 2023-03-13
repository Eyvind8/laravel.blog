<?php

namespace App\Repositories;

use App\Component\BaseRepository;
use App\Models\Items;
use Illuminate\Database\Eloquent\Builder;

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
