<?php

namespace App\Services;

use App\Models\Items;
use App\Repositories\ItemsRepository;

class ItemService
{
    /**
     * @var ItemsRepository
     */
    public $itemsRepository;

    /**
     * @var TagService
     */
    private TagService $tagService;

    /**
     * @param ItemsRepository $itemsRepository
     * @param TagService $tagService
     */
    public function __construct(
        ItemsRepository $itemsRepository, TagService $tagService)
    {
        $this->itemsRepository = $itemsRepository;
        $this->tagService = $tagService;
    }

    /**
     * @param Items $newItem
     * @param array $itemData
     * @return int
     */
    public function store(Items $newItem, array $itemData): int
    {
        $newItem->fill($itemData);
        $newItem->save();

        return (int)optional($newItem)->id;
    }

    /**
     * @param int $itemId
     * @return bool
     */
    public function remove(int $itemId): bool
    {
        if (!$this->itemsRepository->delete($itemId)) {
            return false;
        }

        return $this->tagService->removeItemRelations($itemId);
    }
}
