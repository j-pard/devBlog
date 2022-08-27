<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Return all posts and related comments
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $posts = Post::where('posts.is_published', true)
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->paginate(8);

        return view('index', [
            'posts' => $posts,
        ]);
    }
}
