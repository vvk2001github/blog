<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deleteLiked(Post $post): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        /** @var \App\Models\User $user * */
        $user = auth()->user();
        $user->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked');
    }

    public function index(): View
    {
        return view('personal.index');
    }

    public function liked(): View
    {
        $posts = auth()->user()->likedPosts;

        return view('personal.liked', compact('posts'));
    }

    public function comment(): View
    {
        return view('personal.comment');
    }
}
