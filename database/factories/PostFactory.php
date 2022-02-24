<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();

        return [
            'title' => $this->faker->text(10),
            'content' => $this->faker->paragraph(22),
            // 'slug' => $this->faker->slug(6),
            // 'active' => null,
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'user_id' => random_int(1, $users->count()),
        ];
    }
}
