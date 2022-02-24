<?php

namespace Database\Seeders;

use App\Models\Cotisation;
use App\Models\PostCategorie;
use Database\Factories\CategorieFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if($this->command->confirm("Do you want to refresh the database ?")) {
            $this->command->call("migrate:refresh");
            $this->command->info("database was refreshed !");
        }

        $this->call([
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            CommentTableSeeder::class,
            EventSeederTable::class,
            CotisationTableSeeder::class,
            ImagesTableSeeder::class,
            CategoriesTableSeeder::class,
            PostCategoriesTableSeeder::class,
        ]);
    }
}
