<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Part;
use Faker\Calculator\Ean;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parts = Part::all();

        return Inertia::render('Equipment/Part', ["parts" => $parts]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Equipment/Equipment', ['equipment' => new Equipment()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ 
            'equipment_id' => 'required',
            'period' => 'required',
            'description' => 'required',
            'created_by_company_id' => 'required'
        ]);

        $part = Part::create($validated);

        return redirect(route('equipment.index', ['part' => $part]));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $part)
    {
        $parts = Part::where('equipment_id', '=', $part->id)->with('plans')->get();

        return Inertia::render('Equipment/Part', ['equipment' => $part, 'parts' => $parts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Part $part)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part)
    {
        $part->update(['active' => false]);

        return redirect(route('equipment.index'));
    }
}
