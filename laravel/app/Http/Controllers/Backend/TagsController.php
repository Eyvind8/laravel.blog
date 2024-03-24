<?php

namespace App\Http\Controllers\Backend;

use App\Component\Pagination\Filter;
use App\Http\Requests\FormRequest;
use App\Models\Items;
use App\Repositories\ItemsRepository;
use App\Repositories\TagRepository;
use App\Services\ItemService;
use App\Services\TagService;
use App\Services\TranslationService;
use Illuminate\Http\JsonResponse;

class TagsController extends AdminRootController
{
    public function show(FormRequest $request, TagRepository $tagRepository)
    {
        $requestData = $this->getSessionPaginatorData($request);
        $requestData['sortField'] = 'active_records_count';
        $requestData['sortDirection'] = 'desc';

        $request->merge($requestData);

        $items = $tagRepository->list(new Filter($request->all()))->toArray();

        return view('admin/tags')->with('items', $items);
    }

    public function recalculate(FormRequest $request, TagService $tagService)
    {
        $tagService->recalculateRecords();

        return redirect()->route('admin.tags.show');
    }
}
