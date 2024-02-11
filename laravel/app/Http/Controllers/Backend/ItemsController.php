<?php

namespace App\Http\Controllers\Backend;

use App\Component\Pagination\Filter;
use App\Http\Requests\FormRequest;
use App\Models\Items;
use App\Repositories\ItemsRepository;
use App\Services\ItemService;
use App\Services\TranslationService;

class ItemsController extends AdminRootController
{
    public function show(FormRequest $request, ItemsRepository $itemsRepository)
    {
        $textToTranslate = 'Боксёра может обидеть каждый, но не каждый успеет извиниться';
        $translatedText = (new TranslationService())->translateFromRussianToUkrainian($textToTranslate);
        echo 'Исходный текст: ' . $textToTranslate . '<br>';
        echo 'Переведенный текст: ' . $translatedText ;


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
     */
    public function add(FormRequest $request, ItemService $itemService)
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

        if ($itemService->createItem($dataItem, $tagsItem)) {
            return redirect('/admin/items');;
        }

        return response()->json(['error' => 'Failed to save item'], 400);
    }

    /**
     * @param $itemId
     * @param ItemService $itemService
     */
    public function remove($itemId, ItemService $itemService)
    {
        if ($itemService->remove($itemId)) {
            return response()->json(['result' => true], 200);
        }

        return response()->json(['error' => 'Failed to delete item'], 400);
    }

}
