<?php

namespace App\Http\Controllers\Backend;

use App\Component\Pagination\Filter;
use App\Http\Requests\FormRequest;
use App\Models\Items;
use App\Repositories\ItemsRepository;
use App\Services\ItemService;
use App\Services\TagService;
use App\Services\TranslationService;
use Illuminate\Http\JsonResponse;

class ItemsController extends AdminRootController
{
    public function show(FormRequest $request, ItemsRepository $itemsRepository)
    {
        $requestData = $this->getSessionPaginatorData($request);
        $request->merge($requestData);

        $items = $itemsRepository->list(new Filter($request->all()))->toArray();

        foreach ($items['list'] as $item) {
            /** @var Items $tags */
            $tags = $itemsRepository->getTagsForItem($item->id)->toArray();
            $item->setTags($tags);
        }

        return view('admin/items')->with('items', $items);
    }

    /**
     * @param FormRequest $request
     * @param ItemService $itemService
     * @param TagService $tagService
     */
    public function add(FormRequest $request, ItemService $itemService, TagService $tagService)
    {
        $dataRequest = $request->all();
        $status = $dataRequest['status'] === 'on' ? Items::STATUS_ACTIVE : Items::STATUS_NEW;

        $dataItem = [
            'status' => $status,
            'content' => trim($dataRequest['content']),
            'views' => $dataRequest['views'],
            'likes' => $dataRequest['likes'],
            'created' => $dataRequest['created'],
            'type' => 1,
        ];

        $tagsItem = explode(',', $dataRequest['tags']);
        $item = new Items();

        $itemId = $itemService->store($item, $dataItem);

        if (!$itemId) {
            return response()->json(['error' => 'Failed to save item'], 400);
        }

        // Сохраняем теги
        if ($tagsItem) {
            $tagService->saveItemTags($itemId, $tagsItem);
        }

        return redirect('/admin/items');;
    }

    /**
     * @param $itemId
     * @param ItemService $itemService
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($itemId, ItemService $itemService): JsonResponse
    {
        if ($itemService->remove($itemId)) {
            return response()->json(['result' => true], 200);
        }

        return response()->json(['error' => 'Failed to delete item'], 400);
    }

    /**
     * @param $itemId
     * @param FormRequest $request
     * @param ItemService $itemService
     * @param TagService $tagService
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($itemId, FormRequest $request, ItemService $itemService, TagService $tagService): JsonResponse
    {
        $dataRequest = $request->all();
        $status = $dataRequest['status'] === 'new' ? Items::STATUS_NEW : Items::STATUS_ACTIVE;

        $dataItem = [
            'status' => $status,
            'content' => trim($dataRequest['content']),
            'created' => $dataRequest['created'],
        ];

        $item = $itemService->itemsRepository->get($itemId);

        if (!$itemService->store($item, $dataItem)) {
            return response()->json(['error' => 'Failed to save item'], 400);
        }

        $tagsItem = explode(',', $dataRequest['tags']);

        // Сохраняем теги
        if ($tagsItem) {
            $tagService->removeItemRelations($itemId);
            $tagService->saveItemTags($itemId, $tagsItem);
        }

        return response()->json(['result' => true], 200);
    }

    /**
     * @param FormRequest $request
     * @param TranslationService $translationService
     * @return \Illuminate\Http\JsonResponse
     */
    public function translate(FormRequest $request, TranslationService $translationService): JsonResponse
    {
        $sourceText = $request->get('source_text');
        $translateText = $translationService->translateFromRussianToUkrainian($sourceText);

        return response()->json(['result' => $translateText], 200);
    }

}
