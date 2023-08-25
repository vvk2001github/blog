<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::inRandomOrder()
            ->limit(4)
            ->get();
        $likedPosts = Post::withCount('likedUsers')
            ->orderBy('liked_users_count', 'DESC')
            ->limit(4)
            ->get();
        return view('main.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
