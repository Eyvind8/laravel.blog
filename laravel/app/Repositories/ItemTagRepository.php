<?php

namespace App\Repositories;

// app/Repositories/ItemTagRepository.php

namespace App\Repositories;

use App\Models\ItemTag;

class ItemTagRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createItemTag(array $data)
    {
        return ItemTag::create($data);
    }

    /**
     * Получить все tag_id по item_id
     *
     * @param int $itemId
     * @return array
     */
    public function getTagIdsByItemId(int $itemId): array
    {
        return ItemTag::where('item_id', $itemId)->pluck('tag_id')->toArray();
    }

    /**
     * @param int $itemId
     * @return bool
     */
    public function deleteByItemId(int $itemId): bool
    {
        return ItemTag::where('item_id', $itemId)->delete();
    }
}

