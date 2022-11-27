<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->domainName(),
            'price'=>$this->faker->randomFloat(2,10),
            'discount'=>$this->faker->randomFloat(2,0,100),
            'quantity'=>$this->faker->numberBetween(0,1000),
        ];
    }
}
