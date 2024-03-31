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
    private ItemsParseRepository $itemsParseRepository;

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
        return (bool)$this->itemsParseRepository->delete($itemParseId);
    }
}
