<?php

namespace App\Services;

use App\Repositories\ItemTagRepository;
use App\Repositories\TagRepository;

class TagService
{
    /**
     * @var TagRepository
     */
    protected $tagRepository;

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
     * @param string $tagName
     * @return int
     */
    private function findOrCreateTag(string $tagName): int
    {
        return $this->tagRepository->findOrCreateTag($tagName);
    }


}
