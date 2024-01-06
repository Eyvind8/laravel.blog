<?php

namespace App\Http\Controllers\Frontend;


use App\Component\Pagination\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequest;
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


        $items = $itemsRepository->list(new Filter($request->all()))->toArray();
        //dd($items);

        return view('items/index')->with('items', $items);
    }
}
