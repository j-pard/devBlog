<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = fake()->dateTimeBetween('-1 years', 'now');

        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(rand(1, 5)),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
