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
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(['1', '2', '3', '4', '5']),
            'title' => fake()->text(90),
            'content' => fake()->realTextBetween('4000', '8000'),
            'status' => fake()->randomElement(['published', 'draft']),
            'articale_cover' => 'articale_cover/1737244137.jpg',
            'category' => fake()->randomElement(['Technology', 'Health', 'Business', 'Lifestyle', 'Personal Development', 'Art', 'Travel', 'Education', 'Finance', 'Food', 'Politics', 'Science', 'Entertainment', 'Sports', 'Culture', 'Design']),
            'tag1' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'tag2' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'tag3' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'tag4' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'tag5' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
