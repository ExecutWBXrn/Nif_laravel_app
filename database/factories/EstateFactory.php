<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estate>
 */
class EstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'builder' => $this->faker->name(),
            'user_id' => User::factory(),
            'complex' => $this->faker->company(),
            'city' => $this->faker->city(),
            'price' => $this->faker->numberBetween(50000, 1000000),
            'street' => $this->faker->streetName(),
            'description' => $this->faker->text(),
            'amount_of_room' => $this->faker->numberBetween(1, 5),
            'floor' => $this->faker->numberBetween(1, 20),
            'floor_estate' => $this->faker->numberBetween(20, 40),
            'square' => $this->faker->numberBetween(35, 300),
            'square_of_kitchen' => $this->faker->numberBetween(5, 30),
            'building_date' => $this->faker->date(),
            'is_sell' => $this->faker->boolean(),
        ];
    }
}
