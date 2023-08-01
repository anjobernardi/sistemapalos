<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::all();

        return Inertia::render('Parameter/Maintenance', ["maintenances" => $maintenances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Parameter/CreateMaintenance', ['maintenance' => new Maintenance()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
            'created_by_company_id' => 'required',
        ]);

        if ($request->get('id')) {
            Maintenance::find($request->get('id'))->update($validated);
        }else{
            Maintenance::create($validated);
        }
        
        return redirect(route('maintenance.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        return Inertia::render('Parameter/CreateMaintenance', ['maintenance' => $maintenance]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return redirect(route('maintenance.index'));
    }
}
