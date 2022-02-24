<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CotisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desc' => $this->faker->realTextBetween(5, 10),
            'montant' => $this->faker->randomNumber(3),
            'user_id' => random_int(1, User::all()->count()),
            'event_id' => random_int(1, Event::all()->count()),
        ];
    }
}
