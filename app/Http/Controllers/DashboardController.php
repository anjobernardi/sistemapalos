<?php

namespace App\Http\Controllers;

use App\Models\EquipmentSituation;
use App\Models\Maintenance;
use App\Models\StatusServiceOrder;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_maintenances = Maintenance::withCount('service_order')->get();
        $total_status = StatusServiceOrder::withCount('service_order')->get();
        $total_situations = EquipmentSituation::withCount('service_order')->get();

        return Inertia::render('Dashboard', [
            'total_maintenances' => $total_maintenances, 
            'total_status' => $total_status, 
            'total_situation' => $total_situations]);
    }
}
