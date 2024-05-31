<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quantity'=>$this->faker->randomDigit(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'order_id'=>Order::factory(),
            'dish_id'=>Dish::factory(),
        ];
    }
}
