<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'genre' => $this->faker->randomElement(['Action', 'Comedy', 'Drama', 'Horror', 'Sci-Fi']),
            'duration' => $this->faker->numberBetween(90, 180),
            'release_date' => $this->faker->date(),
            'poster' => $this->faker->imageUrl(300, 450, 'movies', true),
        ];
    }
}
