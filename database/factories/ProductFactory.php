<?php

namespace Database\Factories;

use App\Models\Business;
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
        $businesses = Business::pluck('id');
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(1,10, 100),
            'quantity' => $this->faker->numberBetween(0,10),
            'is_active' => $this->faker->boolean,
            'business_id' => $this->faker->randomElement($businesses),
        ];
    }
}
