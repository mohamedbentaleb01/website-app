<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class CotisationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();

        $event = Event::all();

        if($user->count() == 0 && $event->count() == 0){
            $this->command->info('there is no user or event !');
            return;
        }

        $nbCotisation = (int)$this->command->ask('How many Cotisation do you want to generate ?', 3);

        \App\Models\Cotisation::factory()->create()->each(function($cotisation) use($user, $event){
            $cotisation->user_id = random_int(1, $user->count());
            $cotisation->event_id  = random_int(1, $event->count());
            $cotisation->save();
        });
    }
}
