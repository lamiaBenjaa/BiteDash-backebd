<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "restaurant_id"=>Restaurant::factory(),
            "categorie_id"=>Categorie::factory(),
            "name"=>$this->faker->name(),
            "description"=>$this->faker->text(),
            "price"=>$this->faker->randomFloat(2, 10, 100),
            "image"=>$this->faker->image(),
        ];
    }
}
