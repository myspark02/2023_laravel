<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $posts = Post::all();
        $userIdx = rand(0, $users->count()-1);
        $postIdx = rand(0, $posts->count()-1);
        $user = $users[$userIdx];
        $post = $posts[$postIdx];

        return [
            'content' => fake()->realText(), 
            'user_id' => $user->id,
            'post_id' => $post->id
        ];
    }
}
