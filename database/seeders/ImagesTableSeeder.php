<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Event;
use App\Models\Post;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::all();

        if($events->count() == 0){
            $this->command->info('No post available !');
            return;
        }

        $nbrImages = (int)$this->command->ask('How many images do you want to generate', 20);

        \App\Models\Image::factory($nbrImages)->create()->each(function($image) use($events){
            $image->imageable_type = Event::class;
            $image->imageable_id = random_int(1, $events->count());
            $image->save();
        });
    }
}
