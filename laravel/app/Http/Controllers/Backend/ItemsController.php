<?php

namespace App\Http\Controllers\Backend;

use App\Component\Pagination\Filter;
use App\Http\Requests\FormRequest;
use App\Models\Items;
use App\Repositories\ItemsRepository;
use Illuminate\Support\Facades\Session;

class ItemsController
{
    function show(FormRequest $request, ItemsRepository $itemsRepository)
    {
        $requestData = $request->all();
        $requestData['limit'] = $request->input('limit', 10);
        $requestData['sortField'] = $request->input('sortField', 'created');
        $requestData['sortDirection'] = $request->input('sortDirection', 'desc');
        $request->merge($requestData);

        $items = $itemsRepository->list(new Filter($request->all()))->toArray();

        foreach ($items['list'] as $item) {
            /** @var Items $tags */
            $tags = $itemsRepository->getTagsForItem($item->id)->toArray();
            $item->setTags($tags);
        }

        return view('admin/items')->with('items', $items);
    }
}
