<?php

namespace App\Http\Controllers\Backend;

use App\Component\Pagination\Filter;
use App\Http\Requests\FormRequest;
use App\Models\Items;
use App\Models\ItemsParse;
use App\Repositories\ItemsParseRepository;
use App\Services\ItemParseService;
use App\Services\ItemService;
use App\Services\TagService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ItemsParseController extends AdminRootController
{
    /**
     * @param FormRequest $request
     * @param ItemsParseRepository $itemsParseRepository
     */
    public function show(FormRequest $request, ItemsParseRepository $itemsParseRepository)
    {
        $requestData = $this->getSessionPaginatorData($request);
        $request->merge($requestData);

        $items = $itemsParseRepository->list(new Filter($request->all()))->toArray();

        return view('admin/items-parse')->with('items', $items);
    }

    /**
     * @param FormRequest $request
     * @param ItemService $itemService
     * @param ItemParseService $itemParseService
     * @param TagService $tagService
     */
    public function edit(
        int              $itemId,
        FormRequest      $request,
        ItemService      $itemService,
        ItemParseService $itemParseService,
        TagService       $tagService
    )
    {
        $dataRequest = $request->all();
        $currentDateTime = Carbon::now();
        $createdDateTime = Carbon::createFromFormat('Y-m-d H:i', $dataRequest['publicationDate']);

        if ($createdDateTime->greaterThan($currentDateTime)) {
            // cron script move to Items
            $result = $this->updateItemsParse($itemId, $dataRequest, $itemParseService);
            return response()->json(['resultUpdate' => $result], 200);
        }

        $this->addItem($dataRequest, $itemService, $tagService)
            ->markUseItemsParse($itemId, $itemParseService);


        return response()->json(['resultMove' => true], 200);
    }

    protected function updateItemsParse(int $itemId, array $dataRequest, ItemParseService $itemParseService): bool
    {
        $dataItem = [
            'status' => ItemsParse::STATUS_ACTIVE,
            'publication_date' => $dataRequest['publicationDate'],
        ];

        return $itemParseService->itemsParseRepository->update($itemId, $dataItem);
    }

    protected function markUseItemsParse(int $itemId, ItemParseService $itemParseService): bool
    {
        $dataItem = [
            'status' => ItemsParse::STATUS_USE
        ];

        return $itemParseService->itemsParseRepository->update($itemId, $dataItem);
    }

    protected function addItem(array $dataRequest, ItemService $itemService, TagService $tagService)
    {
        //$status = $dataRequest['status'] === 'on' ? ItemsParse::STATUS_ACTIVE : ItemsParse::STATUS_NEW;

        $dataItem = [
            'status' => ItemsParse::STATUS_ACTIVE,
            'content' => trim($dataRequest['content']),
            'views' => 1,
            'likes' => 0,
            'created' => $dataRequest['publicationDate'],
            'type' => 1,
        ];

        $tagsItem = $dataRequest['tags'] ? explode(',', $dataRequest['tags']) : [];
        $item = new Items();

        $itemId = $itemService->store($item, $dataItem);

        if (!$itemId) {
            return response()->json(['error' => 'Failed to save item'], 400);
        }

        // Сохраняем теги
        if ($tagsItem) {
            $tagService->saveItemTags($itemId, $tagsItem);
        }

        return $this;
    }

    /**
     * @param $itemId
     * @param ItemService $itemParseService
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($itemId, ItemParseService $itemParseService): JsonResponse
    {
        if ($itemParseService->remove($itemId)) {
            return response()->json(['result' => true], 200);
        }

        return response()->json(['error' => 'Failed to delete item'], 400);
    }
}
