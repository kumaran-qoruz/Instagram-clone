<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('home', [

            'posts' => Post::latest()->where('user_id', auth()->user()->id)->get(),
            'users' => User::all()->except(Auth::id()),
        ]);

    }


    public function profile()
    {

        $user   = Auth::user();
        $posts  = Post::where('user_id', $user->id);
        $post   = Post::where('user_id', $user->id)->get();
        return view('shared.navbar_shared.user_profile.profile', [

            'posts' => $posts,
            'post'  => $post,

        ]);
    }


    public function uploade_image(Request $request)
    {
        $this->validate($request, [
            'user_image' => '|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $filename   = $request->profile_image->getClientOriginalName();
            $image      = $request->profile_image->storeAs('profile_image', $filename, 'public');
            Auth()->user()->update(['user_image' => $filename]);
            return $image;

        } else {
            return "no image";
        }
    }


    public function likePost(Request $request)
    {

        $user           = Auth::user();
        $likePost       = $user->likedPosts()->where('post_id', $request->id)->count();
        if ($likePost == 0) {
            $user->likedPosts()->attach($request->id);
        } else {
            $user->likedPosts()->detach($request->id);
        }

        return response()->json([
            'id'        => $request->id,
            'status'    => (bool) $likePost,
            'data'      => $likePost,
            'message'   => $likePost ? 'new obj created!' : 'an error has occurred',
        ], 201);

    }


    public function followUser(Request $request)
    {
        $user           = Auth::user();
        $followers      = $user->followers()->where('follower_id', $request->id)->count();
        if ($followers == 0) {
            $user->followers()->attach($request->id);
        } else {
            $user->followers()->detach($request->id);
        }
        return response()->json([
            'id'        => $request->id,
            'status'    => (bool) $followers,
            'data'      => $followers,
            'message'   => $followers ? 'new obj created!' : 'an error has occurred',
        ], 201);

    }

}
