<?php

namespace Database\Seeders;

use App\Models\Cotisation;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $nbEvents = (int)$this->command->ask('How many Events do you want to add ?', 3);

        \App\Models\Event::factory($nbEvents)->create();

    }
}
