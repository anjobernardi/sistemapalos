<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
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
            'part_id' => fake()->randomElement(Part::pluck('id')),
            'activity' => fake()->company(),
            'active' => fake()->boolean(),
            'created_by_company_id' => fake()->numberBetween(1, 2)
        ];
    }
}
