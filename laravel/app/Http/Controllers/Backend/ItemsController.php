<?php

namespace App\Http\Controllers\Backend;

use App\Component\Pagination\Filter;
use App\Http\Requests\FormRequest;
use App\Models\Items;
use App\Repositories\ItemsRepository;
use App\Services\ItemService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

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

    public function add(FormRequest $request, ItemService $itemService)
    {
        $dataRequest = $request->all();

        $dataItem = [
            'status' => $dataRequest['status'] === 'on' ? Items::STATUS_ACTIVE : Items::STATUS_NEW,
            'content' => trim($dataRequest['content']),
            'views' => $dataRequest['views'],
            'likes' => $dataRequest['likes'],
            'created' => $dataRequest['created'],
            'type' => 1,
        ];

        $tagsItem = explode(',', $dataRequest['tags']);

        $item = $itemService->createItem($dataItem, $tagsItem);


        return response()->json($item, 201);
    }

}
