<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use App\Models\Like;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('Creating 100 users...');
        User::factory(100)->create();

        $this->command->info('Creating 500 articles...');
        Post::factory(500)->create();

        // Seed follows — each user follows 3-10 random authors
        $this->command->info('Creating follow relationships...');
        $userIds = range(1, 100);
        foreach ($userIds as $followerId) {
            $authorsToFollow = collect($userIds)
                ->reject(fn ($id) => $id === $followerId) // don't follow yourself
                ->random(rand(3, 10));

            foreach ($authorsToFollow as $authorId) {
                Follow::create([
                    'follower_id' => $followerId,
                    'author_id' => $authorId,
                ]);
            }
        }

        // Seed likes — each user likes 5-20 random posts
        $this->command->info('Creating likes...');
        $postIds = range(1, 500);
        foreach ($userIds as $userId) {
            $postsToLike = collect($postIds)->random(rand(5, 20));

            foreach ($postsToLike as $postId) {
                Like::create([
                    'user_id' => $userId,
                    'post_id' => $postId,
                ]);
            }
        }

        $this->command->info('Seeding complete! 100 users, 500 articles, follows & likes created.');
    }
}
