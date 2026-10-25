<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;
/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'type' => $this->faker->randomElement(['alcohol', 'liquid_milk', 'solid_dairy', 'meat', 'seafood',
                'vegetable', 'grocery', 'frozen', 'bakery', 'beverage',
                'sauce', 'confectionery', 'eggs', 'oil', 'other',]),
            'unit_id' => Unit::inRandomOrder()->first()?->id,
            'price' => $this->faker->randomFloat(2, 10, 1000)


            
        ];
    }
}
