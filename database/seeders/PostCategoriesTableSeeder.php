<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $categories = Categorie::all();

        if($posts->count() == 0 | $categories->count() == 0){
            $this->command->info('No categories or no Posts Available ! ');
            return;
        }

        $nbPostCategories = (int)$this->command->ask('How many Tags do you want to generate ?', 10);

        \App\Models\PostCategorie::factory($nbPostCategories)->create()->each(function($postCategories) use($posts, $categories){
            $postCategories->post_id = $posts->random()->id;
            $postCategories->category_id = $categories->random()->id;

            $postCategories->save();
        });
    }
}
