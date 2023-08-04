<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenance_id')->constrained();
            $table->foreignId('status_service_order_id')->constrained();
            $table->foreignId('equipment_situation_id')->constrained();
            $table->foreignId('equipment_id')->constrained();
            $table->integer('opening_user');
            $table->integer('closing_user')->nullable();
            $table->float('value_labor', 8, 2)->nullable();
            $table->float('value_parts', 8, 2)->nullable();
            $table->float('third_part_service', 8, 2)->nullable();
            $table->string('observation')->nullable();
            $table->string('description')->nullable();
            $table->boolean('electrical_team')->nullable();
            $table->boolean('mechanical_team')->nullable();
            $table->boolean('closed')->default(false);
            $table->bigInteger('number_so')->default(0); 
            $table->foreignId('created_by_company_id')->constrained()->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};