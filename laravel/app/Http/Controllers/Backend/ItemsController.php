<?php

namespace App\Http\Controllers\Backend;

class ItemsController
{
    function show()
    {
        return view('admin.items', ['key' => 'value']);
    }
}
