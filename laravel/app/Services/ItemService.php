<?php

namespace App\Services;

use App\Repositories\ItemsRepository;

class ItemService
{
    /**
     * @var ItemsRepository
     */
    protected $itemsRepository;

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
     * @param array $itemData
     * @param array $itemTags
     * @return bool
     */
    public function createItem(array $itemData, array $itemTags = []): bool
    {
        $resultSaveItem = $this->itemsRepository->create($itemData);
        $itemId = optional($resultSaveItem)->id;

        if (!isset($itemId)) {
            return false;
        }

        return !$itemTags || $this->tagService->saveItemTags($itemId, $itemTags);
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
