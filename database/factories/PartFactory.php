<?php

namespace Database\Factories;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'equipment_id' => fake()->randomElement(Equipment::pluck('id')),
            'period' => fake()->numberBetween(1, 12),
            'description' => fake()->company(),
            'created_by_company_id' => fake()->numberBetween(1, 2)
        ];
    }
}
