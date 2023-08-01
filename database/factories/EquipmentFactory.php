<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identification' => fake()->languageCode(),
            'qrcode' => fake()->postcode(),
            'manufacturer' => fake()->company(),
            'model' => fake()->company(),
            'specification' => fake()->company(),
            'location' => fake()->streetName(),
            'predictive' => fake()->numberBetween(1, 12),
            'active' => 1,
            'created_by_company_id' => fake()->numberBetween(1, 2)
        ];
    }
}
