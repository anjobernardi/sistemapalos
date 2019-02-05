<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEquipmentRequest;
use App\Http\Requests\StoreEquipmentRequest;
use App\Notifications\SimpleNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Equipment;

class EquipmentsController extends Controller
{

    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$equipments = Equipment::orderBy('created_at', 'DESC')->paginate(10);
		switch ($request->ws) {
			case 'getEquipments' :
				return $equipments;
				break;

			default :
				return view('equipments.index', compact('equipments'));
				break;
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipments.create');
    }

    /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreEquipmentRequest $request)
	{
		try {
			$equipment = Equipment::create($request->all());
			$response = redirect()->route('equipments.index')->withSuccess($equipment->identification . ' has been created!');
		} catch (\Throwable $t) {
			$response = redirect()->back()->withErrors($t->getMessage());
		}

		return $response;
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('equipments.show', compact('equipments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->all());
		return redirect()->route('equipments.index')->withSuccess($equipment->identification . ' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
