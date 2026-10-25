<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'first_name' => $this->faker->firstName('male'),
            'second_name' => $this->faker->lastName(),
            'born_date' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'phone' => '+7' . $this->faker->unique()->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'discount_percent' => $this->faker->randomElement([0, 5, 10, 15, 25, 30]),
            'quantity_visited' => $this->faker->numberBetween(0, 50),
        ];
    }
}
