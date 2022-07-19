<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SellFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subtotal' => $this->faker->numberBetween(100,200),
            'iva' => $this->faker->numberBetween(10,80),
            'total' => $this->faker->numberBetween(200,500),
            'status_id' => $this->faker->numberBetween(1,3),
            'business_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
