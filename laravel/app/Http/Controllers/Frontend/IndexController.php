<?php

namespace App\Http\Controllers\Frontend;


use App\Component\Pagination\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequest;
use App\Repositories\ItemsRepository;

class IndexController extends Controller
{
    public function index(FormRequest $request, ItemsRepository $itemsRepository)
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

        $items = $itemsRepository->list(new Filter($request->all()))->toArray();

        return view('items/index')->with('items', $items);
    }
}
