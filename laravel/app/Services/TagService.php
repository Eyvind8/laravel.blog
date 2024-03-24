<?php

namespace App\Services;

use App\Models\Tag;
use App\Repositories\ItemTagRepository;
use App\Repositories\TagRepository;

class TagService
{
    /**
     * @var TagRepository
     */
    public $tagRepository;

    /**
     * @var ItemTagRepository
     */
    private ItemTagRepository $itemTagRepository;

    /**
     * @param TagRepository $tagRepository
     * @param ItemTagRepository $itemTagRepository
     */
    public function __construct(TagRepository $tagRepository, ItemTagRepository $itemTagRepository)
    {
        $this->tagRepository = $tagRepository;
        $this->itemTagRepository = $itemTagRepository;
    }

    /**
     * @param int $itemId
     * @param array $tags
     * @return bool
     */
    public function saveItemTags(int $itemId, array $tags): bool
    {
        foreach ($tags as $tag) {
            $tagId = $this->findOrCreateTag($tag);

            $createdItemTag = $this->itemTagRepository->createItemTag(['item_id' => $itemId, 'tag_id' => $tagId]);

            if (!$createdItemTag) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param int $itemId
     * @return bool
     */
    public function removeItemRelations(int $itemId): bool
    {
        $tagIds = $this->itemTagRepository->getTagIdsByItemId($itemId);

        if (!$tagIds) {
            return true;
        }

        // удалаяем связи
        $this->itemTagRepository->deleteByItemId($itemId);

        // удаляем непривязанные теги
        return $this->deleteUnusedTags($tagIds);
    }

    /**
     * @param array $tagIds
     * @return bool
     */
    public function deleteUnusedTags(array $tagIds): bool
    {
        // Находим теги, которые не связаны с items
        $unusedTags = $this->tagRepository->getUnusedTags($tagIds);

        // Удаляем эти теги
        foreach ($unusedTags as $tagId) {
            $this->tagRepository->delete($tagId);
        }

        return true;
    }


    /**
     * @param string $tagName
     * @return int
     */
    private function findOrCreateTag(string $tagName): int
    {
        return $this->tagRepository->findOrCreateTag($tagName);
    }

    /**
     * @return void
     */
    public function recalculateRecords(): void
    {
        $tags = Tag::all();

        foreach ($tags as $tag) {
            $activeRecordsCount = $this->tagRepository->getActiveRecordsCount($tag->id);
            $totalRecordsCount = $this->tagRepository->getTotalRecordsCount($tag->id);

            $tag->active_records_count = $activeRecordsCount;
            $tag->total_records_count = $totalRecordsCount;
            $tag->save();
        }

        $activeRecordsCount = [];
        $totalRecordsCount = [];
        $tags = Tag::where('parent_id', '>', 0)->get();


        $tags->each(function ($tag) use (&$activeRecordsCount, &$totalRecordsCount) {
            /** @var $tag Tag */
            if (!isset($activeRecordsCount[$tag->parent_id])) {
                $activeRecordsCount[$tag->parent_id] = $tag->active_records_count;
            } else {
                $activeRecordsCount[$tag->parent_id] += $tag->active_records_count;
            }


            if (!isset($totalRecordsCount[$tag->parent_id])) {
                $totalRecordsCount[$tag->parent_id] = $tag->total_records_count;
            } else {
                $totalRecordsCount[$tag->parent_id] += $tag->total_records_count;
            }
        });

        foreach ($activeRecordsCount as $parentId => $activeCount) {
            $tag = Tag::find($parentId);

            if ($tag) {
                $tag->active_records_count += $activeCount;
                $tag->save();
            }
        }

        foreach ($totalRecordsCount as $parentId => $totalCount) {
            $tag = Tag::find($parentId);

            if ($tag) {
                $tag->total_records_count += $totalCount;
                $tag->save();
            }
        }

    }

}
