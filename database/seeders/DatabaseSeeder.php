<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Andre Bernardi',
            'email' => 'anjobernardi@msn.com',
            'password' => Hash::make(12345678),
            'is_admin' => 1,
            'company_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Empresa 2',
            'email' => 'empresa2@msn.com',
            'password' => Hash::make(12345678),
            'is_admin' => 1,
            'company_id' => 2
        ]);

        //\App\Models\User::factory(5)->create();

        //EMPRESA 1
        \App\Models\Maintenance::factory()->create([
            'description' => 'Preditiva',
            'created_by_company_id' => 1
        ]);
        \App\Models\Maintenance::factory()->create([
            'description' => 'Corretiva',
            'created_by_company_id' => 1
        ]);
        \App\Models\Maintenance::factory()->create([
            'description' => 'Preventiva',
            'created_by_company_id' => 1
        ]);

        //EMPRESA 2
        \App\Models\Maintenance::factory()->create([
            'description' => 'Preditiva',
            'created_by_company_id' => 2
        ]);
        \App\Models\Maintenance::factory()->create([
            'description' => 'Corretiva',
            'created_by_company_id' => 2
        ]);
        \App\Models\Maintenance::factory()->create([
            'description' => 'Preventiva',
            'created_by_company_id' => 2
        ]);

        \App\Models\StatusServiceOrder::factory(10)->create();
        \App\Models\EquipmentSituation::factory(10)->create();
        \App\Models\Equipment::factory(10)->create();
        \App\Models\Part::factory(40)->create();
        \App\Models\Plan::factory(40)->create();
        \App\Models\ServiceOrder::factory(10)->create();
    }
}
