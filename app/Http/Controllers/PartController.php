<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Part;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PartController extends Controller
{
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
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part)
    {
        $part->update(['active' => false]);

        return redirect(route('equipment.index'));
    }
}
