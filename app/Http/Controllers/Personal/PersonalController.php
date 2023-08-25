<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
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

    public function commentDelete(Comment $comment): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }

    public function commentEdit(Comment $comment)
    {
        return view('personal.comment.edit', compact('comment'));
    }

    public function commentUpdate(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('personal.comment.index');
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
        $comments = auth()->user()->comments;
        return view('personal.comment.index', compact('comments'));
    }
}
