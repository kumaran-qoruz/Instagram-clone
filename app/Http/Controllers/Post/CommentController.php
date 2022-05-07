<?php

namespace App\Http\Controllers\Post;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment_store(Request $request)
    {

        $this->validate($request, [
            'post_comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->post_comment = $request->post_comment;
        $comment->save();
        return response()->json([
            'id'        => $request->post_id,
            'status'    => (bool) $comment,
            'data'      => $comment,
            'message'   => $comment ? 'new obj created!' : 'an error has occurred',
        ], 201);

    }
}
