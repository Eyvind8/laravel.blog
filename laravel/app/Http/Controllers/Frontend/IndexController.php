<?php

namespace App\Http\Controllers\Frontend;


use App\Component\Pagination\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequest;
use App\Models\Comment;
use App\Models\Items;
use App\Repositories\ItemsRepository;
use App\Repositories\TagRepository;

class IndexController extends Controller
{
    /**
     * @param FormRequest $request
     * @param ItemsRepository $itemsRepository
     */
    public function index(
        FormRequest     $request,
        ItemsRepository $itemsRepository
    )
    {
        /**
         * $redis = Redis::connection()->client();
         * echo "Connection to server sucessfully <br>";
         * $redis->set("tutorial-name", "Redis tutorial");
         * echo "Stored string in redis:: " . $redis->get("tutorial-name") . '<br>';
         */

        //$item = $itemsRepository->get(1);
        //dump($item->content);

        //$items = $itemsRepository->all();
        //dd($items);

        //$tags = $tagRepository->all();
        //dd($tags[0]->name);

        $requestData = $request->all();
        $requestData['sortField'] = 'created';
        $requestData['sortDirection'] = 'desc';
        $request['filter'] = json_decode('{
                                                  "type": "group",
                                                  "expression": "and",
                                                  "fields": [
                                                    {
                                                      "type": "field",
                                                      "name": "status",
                                                      "expression": "eq",
                                                      "value": 1,
                                                      "dataType": "select"
                                                    }
                                                  ]
                                                }', true);
        $request->merge($requestData);

        $items = $itemsRepository->list(new Filter($request->all()))->toArray();

        foreach ($items['list'] as $item) {
            /** @var Items $tags */
            $tags = $itemsRepository->getTagsForItem($item->id)->toArray();
            $item->setTags($tags);
        }

        return view('items/index')->with('items', $items);
    }

    /**
     * @param $itemId
     * @param ItemsRepository $itemsRepository
     * @return \Illuminate\Contracts\View\View
     */
    public function show($itemId, ItemsRepository $itemsRepository)
    {
        $item = $itemsRepository->get($itemId);
        $tags = $itemsRepository->getTagsForItem($itemId)->toArray();
        $item->setTags($tags);

        $comments = Comment::where('item_id', $itemId)->orderBy('id', 'desc')->get();

        return view('items/item')->with(['item' => $item, 'comments' => $comments]);
    }

    /**
     *
     */
    public function contact()
    {
        return view('items/contact');
    }

    /**
     * @param FormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function incrementViews(FormRequest $request)
    {
        $itemIds = $request->input('itemIds', []);

        if (!empty($itemIds)) {
            Items::whereIn('id', $itemIds)->increment('views');
        }

        return response()->json(['success' => true]);
    }

    /**
     * @param $itemId
     * @return \Illuminate\Http\JsonResponse
     */
    public function incrementLike($itemId)
    {
        $item = Items::findOrFail($itemId);

        $item->increment('likes');

        return response()->json([
            'likes_count' => $item->likes,
        ]);
    }
}
