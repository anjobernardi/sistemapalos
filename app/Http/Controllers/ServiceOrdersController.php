<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceOrder;

class ServiceOrdersController extends Controller
{
    	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$serviceorders = ServiceOrder::orderBy('created_at', 'DESC')->paginate(10);
		switch ($request->ws) {
			case 'getServiceOrders' :
				return $serviceorders;
				break;

			default :
				return view('serviceorders.index', compact('serviceorders'));
				break;
		}
	}
}
