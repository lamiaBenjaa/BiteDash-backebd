<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
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
            "rating"=>$this->faker->randomFloat(1, 0, 5),
            "comment"=>$this->faker->text(),
            "user_id"=>User::factory(),
            "restaurant_id"=>Restaurant::factory(),
        ];
    }
}
