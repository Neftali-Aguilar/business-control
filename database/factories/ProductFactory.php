<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(10,100),
            'quantity' => $this->faker->numberBetween(0,10),
            'is_active' => $this->faker->boolean
        ];
    }
}
