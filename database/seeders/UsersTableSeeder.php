<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbusers = (int)$this->command->ask('How many users do you want to generate ?', 10);
        \App\Models\User::factory($nbusers)->create();
    }
}
