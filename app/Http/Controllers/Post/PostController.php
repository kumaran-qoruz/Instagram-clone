<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function store(Request $request)
    {

        $post = new Post();
        $post->post_caption = $request->post_caption;
        $post->user_id = Auth::id();
        $post->user_name = Auth::user()->name;

        if ($request->hasFile('profile_image')) {
            $newimage = $request->file('profile_image');
            $newname = time() . '.' . $newimage->getClientOriginalName();
            $destinationPath = public_path('/storage/galeryImages/');
            $newimage->move($destinationPath, $newname);
            $post->post_image = 'storage/galeryImages/' . $newname;
            $post->save();
        }
        return response()->json([
            'id' => $request->id,
            'status' => (bool) $post,
            'data' => $post,
            'message' => $post ? 'new obj created!' : 'an error has occurred',
        ], 201);
    }

}
