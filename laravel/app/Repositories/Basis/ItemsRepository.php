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

    /**
     * @param int $id
     * @return Items|null
     */
    public function getById(int $id): ?Items
    {
        return $this->query()
            ->where('id', '=', $id)
            ->first();
    }

    /**
     * @param array $attributes
     * @return Items
     */
    public function create(array $attributes = []): Items
    {
        return $this->query()->create($attributes);
    }
}
