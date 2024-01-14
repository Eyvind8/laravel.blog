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
    public function index(
        FormRequest     $request,
        ItemsRepository $itemsRepository,
        TagRepository   $tagRepository
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
}
