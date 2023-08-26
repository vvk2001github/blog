<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        $randomPosts = Post::inRandomOrder()
            ->limit(4)
            ->get();
        $likedPosts = Post::withCount('likedUsers')
            ->orderBy('liked_users_count', 'DESC')
            ->limit(4)
            ->get();

        return view('main.index', compact('posts', 'randomPosts', 'likedPosts'));
    }

    public function categories(): View
    {
        $categories = Category::orderBy('title')->paginate(3);
        return view('main.categories.index', compact('categories'));
    }
    public function categoryShow(Category $category): View
    {
        $posts = $category->posts()->paginate(3);
        $randomPosts = Post::inRandomOrder()
            ->limit(4)
            ->get();
        $likedPosts = Post::withCount('likedUsers')
            ->orderBy('liked_users_count', 'DESC')
            ->limit(4)
            ->get();

        return view('main.categories.show', compact('category', 'posts', 'randomPosts', 'likedPosts'));
    }
}
