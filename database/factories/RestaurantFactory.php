<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name(),
            "description"=>$this->faker->text(),
            "adress"=>$this->faker->address(),
            "phone"=>$this->faker->e164PhoneNumber(),
            "openingHours"=>$this->faker->randomDigit(),
            'rating'=>$this->faker->randomFloat(1, 0, 5),
            'image'=>$this->faker->image(),
        ];
    }
}
