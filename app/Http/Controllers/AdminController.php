<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $usersCount = User::all()->count();
        $postsCount = Post::all()->count();
        $categoriesCount = Category::all()->count();
        $tagsCount = Tag::all()->count();
        return view('admin.index', compact('usersCount', 'postsCount', 'categoriesCount', 'tagsCount'));
    }
}
