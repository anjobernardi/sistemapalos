<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::with(['parts'])->where('active', '=', true )->get();

        return Inertia::render('Equipment/Equipment', ["equipments" => $equipments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Equipment/CreateEquipment', ['equipment' => new Equipment()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ 
            'identification' => 'required',
            'created_by_company_id' => 'required'
        ]);

        $equipamentos = [
            'qrcode' => $request->get('qrcode') ?? null,
            'manufacturer' => $request->get('manufacturer') ?? null,
            'model'  => $request->get('model') ?? null,
            'specification'  => $request->get('specification') ?? null,
            'location'  => $request->get('location') ?? null,
            'active' => $request->get('active') ?? false
        ];

        $validated = array_merge($validated,$equipamentos);

        if ($request->get('id'))
        {   
            Equipment::find($request->get('id'))->update($validated);
        } else {
            Equipment::create($validated);
        }

        return redirect(route('equipment.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        return Inertia::render('Equipment/CreateEquipment', ['equipment' =>  $equipment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->update(['active' => false]);

        return redirect(route('equipment.index'));
    }
}
