<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function show(Post $post): View
    {
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('post.show', compact('post'), compact('relatedPosts'));
    }

    public function commentStore(Post $post, StoreRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);

        return redirect()->route('post.show', $post);
    }

    public function likeStore(Post $post): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        /** @var \App\Models\User $user * */
        $user = auth()->user();
        $user->likedPosts()->toggle($post);

        return redirect()->back();
    }
}
