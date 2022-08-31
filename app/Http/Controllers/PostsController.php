<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostsController extends Controller
{
    private int $perPage = 6;

    /**
     * Display a listing of the resource.
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
            'posts' => new PostsResource($postsQuery->paginate($this->perPage)),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return JsonResponse
     */
    public function store(StorePostRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $post = Post::create(Arr::only($validated, ['title', 'body', 'user_id', 'is_published']));

        return response()->json([
            'data' => new PostResource($post),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return PostResource
     */
    public function show(int $id): PostResource
    {
        $post = Post::findOrFail($id);

        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(UpdatePostRequest $request, int $id): JsonResponse
    {
        $validated = $request->validated();
        $post = Post::findOrFail($id);

        $post->update(Arr::only($validated, ['title', 'body', 'is_published']));

        return response()->json([
            'data' => new PostResource($post),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return response()->json([], 200);
    }
}
