<?php

namespace App\Http\Resources;

use App\Models\Post;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostsResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->map(function (Post $post) {

            return [
                'id' => $post->id,
                'title' => $post->title,
                'body' => $post->body,
                'updated_at' => $post->updated_at,
                'comments_count' => $post->comments_count,
                'author' => new UserResource($post->user),
            ];
        });
    }
}
