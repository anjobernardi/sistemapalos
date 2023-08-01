<?php

namespace App\Http\Controllers;

use App\Models\EquipmentSituation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipmentSituationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipmentSituation = EquipmentSituation::all();

        return Inertia::render('Parameter/EquipmentSituation', ["equipment_situations" => $equipmentSituation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Parameter/CreateEquipmentSituation', ['equipment_situation' => new EquipmentSituation()]);
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
            EquipmentSituation::find($request->get('id'))->update($validated);
        }else{
            EquipmentSituation::create($validated);
        }

        return redirect(route('equipment_situation.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentSituation $equipmentSituation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipmentSituation $equipmentSituation)
    {
        return Inertia::render('Parameter/CreateEquipmentSituation', ['equipment_situation' => $equipmentSituation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EquipmentSituation $equipmentSituation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentSituation $equipmentSituation)
    {
        $equipmentSituation->delete();

        return redirect(route('equipment_situation.index'));
    }
}
