<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id"=>User::factory(),
            "restaurant_id"=>Restaurant::factory(),
            "orderDate"=>$this->faker->date(),
            "deliveryAdress"=>$this->faker->address(),
            "totalAmount"=>$this->faker->randomFloat(2, 10, 100),
            "status"=>$this->faker->randomElement(['pending', 'confirmed', 'delivered']),
        ];
    }
}
