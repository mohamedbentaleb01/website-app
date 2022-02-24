<?php

namespace Database\Factories;

use App\Models\Cotisation;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'title' => $this->faker->text(10),
            'content' => $this->faker->text(25),
            'plannified_at' => $this->faker->dateTimeBetween('now', '1 year'),
        ];
    }
}
