<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbCategories = (int)$this->command->ask('How many Categories do you want to add ? ', 5);

        \App\Models\Categorie::factory($nbCategories)->create();
    }
}
