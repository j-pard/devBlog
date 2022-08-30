<?php

namespace App\Http\Controllers;

use App\Http\Resources\Posts;
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
        // Author is eager loaded from the model
        $postsQuery = Post::where('posts.is_published', true)
            ->withCount('comments');

        return view('index', [
            'posts' => new Posts($postsQuery->paginate(8)),
        ]);
    }
}
