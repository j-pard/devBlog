<?php

namespace App\Http\Resources;

use App\Models\Post;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'updated_at' => $this->updated_at,
            'comments_count' => $this->comments_count,
            'author' => new UserResource($this->user),
        ];
    }
}
