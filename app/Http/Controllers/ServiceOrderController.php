<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\EquipmentSituation;
use App\Models\Maintenance;
use App\Models\ServiceOrder;
use App\Models\StatusServiceOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_orders = ServiceOrder::with('equipment', 'equipment_situation', 'status_service_order', 'maintenance', 'open_user', 'close_user', 'user')
                                        ->where('closed', false)
                                        ->get();
        return Inertia::render('ServiceOrder/ServiceOrder', [ "service_orders" => $service_orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::denies('manage-service-order'))
        {
           return Inertia::render('Noaccess');
        }

        $maintenances = Maintenance::all();
        $status_service_orders = StatusServiceOrder::all();
        $equipment_situations = EquipmentSituation::all();
        $equipments = Equipment::with('parts')->where('active', true)->get();
        $users = User::all();

        return Inertia::render('ServiceOrder/CreateServiceOrder', [
            'service_order' => ['service_order' => new ServiceOrder()],
            'maintenances' => $maintenances,
            'status_service_orders' => $status_service_orders,
            'equipment_situations' => $equipment_situations, 
            'equipments' => $equipments,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
               
            $number_so = ServiceOrder::where('created_by_company_id', auth()->user()->company_id)->max('number_so') + 1;

            $validated = $request->validate([ 
                'maintenance_id' => 'required',
                'status_service_order_id' => 'required',
                'equipment_situation_id' => 'required',
                'equipment_id' => 'required',
                'opening_user' => 'required',
                'created_by_company_id' => 'required'
            ]);

            $orders = [
                'closing_user' => null,
                'value_labor' => $request->get('value_labor') ?? null,
                'value_parts' => $request->get('value_parts') ?? null,
                'third_part_service' => $request->get('third_part_service') ?? null,
                'observation' => $request->get('observation') ?? null,
                'description' => $request->get('description') ?? null,
                'electrical_team' => $request->get('electrical_team') ?? false,
                'mechanical_team' => $request->get('mechanical_team') ?? false,
                'started_at' => Carbon::parse(str_replace('/', '-', $request->get('started_at')))->format('Y-m-d h:i') ?? null,
                'ended_at' => Carbon::parse(str_replace('/', '-', $request->get('ended_at')))->format('Y-m-d h:i') ?? null,
                'user_id' => $request->get('user_id') ?? null,
            ];
   
            $validated = array_merge($validated, $orders);

            if ($request->get('id'))
            {    
                 $service_order = ServiceOrder::find($request->get('id'));
                 $service_order->update($validated);
                 $service_order->parts()->syncWithPivotValues($request->get('selected'), ['maintenance_date' => Carbon::now()]);

            } else {

                $number_so = ['number_so' =>  ServiceOrder::where('created_by_company_id', auth()->user()->company_id)->max('number_so') + 1];

                $validated = array_merge($validated, $number_so);

                $service_order = ServiceOrder::create($validated);
                $service_order->parts()->syncWithPivotValues($request->get('selected'), ['maintenance_date' => Carbon::now()]);
            }
     
            return redirect(route('service_order.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceOrder $serviceOrder)
    {
        if(Gate::denies('manage-service-order'))
        {
           return Inertia::render('Noaccess');
        }

        $maintenances = Maintenance::all();
        $status_service_orders = StatusServiceOrder::all();
        $equipment_situations = EquipmentSituation::all();
        $equipments = Equipment::with('parts')->where('active', true)->get();
        $users = User::all();

        return Inertia::render('ServiceOrder/CreateServiceOrder', [
            'service_order' =>  $serviceOrder->loadMissing('equipment', 'open_user', 'close_user', 'parts'), 
            'maintenances' => $maintenances,
            'status_service_orders' => $status_service_orders,
            'equipment_situations' => $equipment_situations,
            'equipments' => $equipments,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function close(ServiceOrder $serviceOrder)
    {
        $serviceOrder->update(['closed' => true, 'closing_user' => auth()->id()]);

        return redirect(route('service_order.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceOrder $serviceOrder)
    {
        $serviceOrder->delete();

        return redirect(route('service_order.index'));
    }
}
