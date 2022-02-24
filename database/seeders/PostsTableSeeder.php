<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        if($users->count() == 0){
            $this->command->info("there is no users !");
            return;
        }

        $nbposts = (int)$this->command->ask('How many posts do you want to generate', 30);

        \App\Models\Post::factory($nbposts)->create()->each(function($post) use($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
