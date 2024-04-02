<?php

namespace App\Services;

use App\Models\Items;
use App\Models\ItemsParse;
use App\Repositories\ItemsParseRepository;
use App\Repositories\ItemsRepository;

class ItemParseService
{
    /**
     * @var ItemsRepository
     */
    public $itemsRepository;

    /**
     * @var ItemsParseRepository
     */
    public ItemsParseRepository $itemsParseRepository;

    /**
     * @param ItemsRepository $itemsRepository
     * @param TagService $tagService
     */
    public function __construct(ItemsRepository $itemsRepository, ItemsParseRepository $itemsParseRepository)
    {
        $this->itemsRepository = $itemsRepository;
        $this->itemsParseRepository = $itemsParseRepository;
    }

    /**
     * @param string $jokeText
     * @return bool
     */
    public function storeItemParse(string $jokeText): bool
    {
        $translationService = new TranslationService();

        return (bool)ItemsParse::firstOrCreate([
            'content' => $jokeText,
        ], [
            'content' => $jokeText,
            'content_ua' => $translationService->translateFromRussianToUkrainian($jokeText),
        ]);
    }

    /**
     * @param Items $newItem
     * @param array $itemData
     * @return int
     */
    public function storeItemByParseItem(Items $newItem, array $itemData): int
    {
        $newItem->fill($itemData);
        $newItem->save();

        return (int)optional($newItem)->id;
    }

    /**
     * @param int $itemParseId
     * @return bool
     */
    public function remove(int $itemParseId): bool
    {
        $dataItem = [
            'status' => ItemsParse::STATUS_DELETE
        ];

        return $this->itemsParseRepository->update($itemParseId, $dataItem);
    }

    public function updateItemsParse(int $itemParseId, array $data): bool
    {
        $dataItem = [
            'status' => ItemsParse::STATUS_ACTIVE,
            'publication_date' => $data['publicationDate'],
        ];

        return $this->itemsParseRepository->update($itemParseId, $dataItem);
    }

    public function markUseItemsParse(int $itemParseId): bool
    {
        $dataItem = [
            'status' => ItemsParse::STATUS_USE
        ];

        return $this->itemsParseRepository->update($itemParseId, $dataItem);
    }
}
