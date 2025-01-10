<?php

namespace Database\Factories;

use App\Models\User;
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
            'title' => fake()->jobTitle(),
            'content' => fake()->realTextBetween('900', '1700'),
            'status' => fake()->randomElement(['draft', 'published']),
            'articale_cover' => 'articale_cover/1736011213.jpg',
            'tag1' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'tag2' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'tag3' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'tag4' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days']),
            'tag5' => fake()->randomElement(['AI', 'tech', 'bussiness', 'world', 'days'])
        ];
    }
}
