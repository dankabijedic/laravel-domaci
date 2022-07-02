<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Movie;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rating'=>$this->faker->numberBetween($min = 1, $max = 10),
            'comment'=>$this->faker->sentence(),
            'user_id'=>User::factory(),
            'movie_id'=>Movie::factory(),
        ];
    }
}
