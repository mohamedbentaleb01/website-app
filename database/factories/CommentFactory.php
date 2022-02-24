<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $posts = Post::all();
        $users = User::all();

        return [
            'content' => $this->faker->text(30),
            'post_id' => random_int(1, $posts->count()),
            'user_id' => random_int(1, $users->count()),
        ];
    }
}
