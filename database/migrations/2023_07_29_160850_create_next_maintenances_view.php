<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     
    public function up(): void
    {
        if(Schema::hasTable('next_maintenances_view')) return;
        DB::statement(" CREATE VIEW next_maintenances_view AS
                        SELECT 
                            a.id as 'service_order_id',
                            b.id as 'equipment_id', 
                            b.identification, 
                            c.part_id, 
                            date_add(c.maintenance_date, interval d.period month) as 'next_maintenance'
                        FROM 
                            service_orders a
                            inner join equipment b on a.equipment_id = b.id
                            inner join parts d on b.id = d.equipment_id
                            inner join part_service_order c on a.id = c.service_order_id 
                        ORDER BY 'service_order_id' asc LIMIT 0,100");
    }
*/
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("next_maintenances_view");
    }
};
