<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Requests\FormRequest;
use App\Repositories\Basis\ItemsRepository;
use Illuminate\Support\Facades\Redis;

class IndexController
{
    public function index(FormRequest $request, ItemsRepository $itemsRepository)
    {
        /**
         * $redis = Redis::connection()->client();
         * echo "Connection to server sucessfully <br>";
         * $redis->set("tutorial-name", "Redis tutorial");
         * echo "Stored string in redis:: " . $redis->get("tutorial-name") . '<br>';
         *
         * $item = $itemsRepository->getById(1);
         * dd($item->content);
         */

        return view('items/index');
    }
}
