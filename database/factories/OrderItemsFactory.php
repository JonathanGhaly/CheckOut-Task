<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_id'=>$this->faker->numberBetween(1,10),
            'order_id'=>$this->faker->numberBetween(1,2),
            'items_quantity'=>$this->faker->numberBetween(1,100)
        ];
    }
}
