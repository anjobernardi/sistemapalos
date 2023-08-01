<?php

namespace App\Http\Controllers;

use App\Models\StatusServiceOrder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatusServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statusServiceOrder = StatusServiceOrder::all();

        return Inertia::render('Parameter/StatusServiceOrder', ['status_service_orders' => $statusServiceOrder]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Parameter/CreateStatusServiceOrder', ['status_service_order' => new StatusServiceOrder()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
            'created_by_company_id' => 'required'
        ]);

        if($request->get('id')) {
            StatusServiceOrder::find($request->get('id'))->update($validated);
        }else {
            StatusServiceOrder::create($validated);
        }

        return redirect(route('status_service_order.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusServiceOrder $statusServiceOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusServiceOrder $statusServiceOrder)
    {
        return Inertia::render('Parameter/CreateStatusServiceOrder', ['status_service_order' => $statusServiceOrder]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusServiceOrder $statusServiceOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusServiceOrder $statusServiceOrder)
    {
        $statusServiceOrder->delete();

        return redirect(route('status_service_order.index'));
    }
}
