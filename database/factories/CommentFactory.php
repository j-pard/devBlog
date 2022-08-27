<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::whereNotNull('id')->pluck('id');
        $postIds = Post::whereNotNull('id')->pluck('id');

        $date = fake()->dateTimeBetween('-1 years', 'now');

        return [
            'user_id' => $userIds->random(),
            'post_id' => $postIds->random(),
            'body' => fake()->paragraph(rand(1, 3)),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
