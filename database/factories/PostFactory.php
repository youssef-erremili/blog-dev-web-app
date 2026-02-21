<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
            'user_id' => fake()->numberBetween(1, 100),
            'title' => fake()->text(90),
            'content' => fake()->realTextBetween('4000', '8000'),
            'status' => 'published',
            'article_cover' => 'https://picsum.photos/seed/' . fake()->unique()->numberBetween(1, 10000) . '/800/500',
            'category' => fake()->randomElement(['Technology', 'Health', 'Business', 'Lifestyle', 'Personal Development', 'Art', 'Travel', 'Education', 'Finance', 'Food', 'Design', 'Coding', 'Software', 'Motivation']),
            'tag1' => fake()->randomElement(['AI', 'tech', 'business', 'world', 'coding']),
            'tag2' => fake()->randomElement(['design', 'startup', 'health', 'life', 'productivity']),
            'tag3' => fake()->randomElement(['innovation', 'career', 'mindset', 'growth', 'science']),
            'tag4' => fake()->randomElement(['web', 'mobile', 'data', 'cloud', 'security']),
            'tag5' => fake()->randomElement(['leadership', 'creativity', 'learning', 'future', 'trends']),
            'views' => fake()->numberBetween(10, 5000),
            'featured' => fake()->randomElement(['true', 'false']),
            'created_at' => Carbon::instance(fake()->dateTimeBetween('-1 year', 'now')),
            'updated_at' => now(),
        ];
    }
}
