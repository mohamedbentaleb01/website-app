<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostCategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = Post::all();
        $category = Categorie::all();

        return [
            'post_id' => random_int(1, $post->count()),
            'category_id' => random_int(1, $category->count()),
        ];
    }
}
