<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:item,id',
            'comment' => 'required|string|max:255',
        ]);

        $comment = new Comment([
            'item_id' => $request->input('item_id'),
            'text' => $request->input('comment'),
        ]);

        $comment->save();

        return response()->json(['message' => 'Коментар успішно доданий та зараз на модерацiї']);
    }
}
