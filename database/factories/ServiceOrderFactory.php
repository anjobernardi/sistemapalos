<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\EquipmentSituation;
use App\Models\Maintenance;
use App\Models\StatusServiceOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceOrder>
 */
class ServiceOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'maintenance_id' => fake()->randomElement(Maintenance::pluck('id')),
            'status_service_order_id' => fake()->randomElement(StatusServiceOrder::pluck('id')),
            'equipment_situation_id' => fake()->randomElement(EquipmentSituation::pluck('id')),
            'equipment_id' => fake()->randomElement(Equipment::pluck('id')),
            'opening_user' => fake()->randomElement(User::pluck('id')),

            'value_labor' => fake()->numberBetween(1, 100),
            'value_parts' => fake()->numberBetween(1, 100),
            'third_part_service' => fake()->numberBetween(1, 100),
            'observation' => fake()->text(),
            'description' => fake()->text(),
            'electrical_team' => fake()->boolean(),
            'mechanical_team' => fake()->boolean(),
            'created_by_company_id' => fake()->numberBetween(1, 2)
        ];
    }
}
