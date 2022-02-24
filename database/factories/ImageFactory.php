<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $posts = Post::all();
        $events = Event::all();

        return [
            'path' => $this->faker->imageUrl($width=800, $height=800, 'dogs', true, 'Faker'),
            'imageable_type' => Event::class,
            'imageable_id' => random_int(1, $events->count()),
        ];
    }
}
