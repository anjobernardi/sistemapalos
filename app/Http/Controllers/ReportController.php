<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ViewNextMaintenances;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Response;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directory = storage_path('app/reports/');
        $files = File::allFiles($directory);

        $fileNames = [];
    
        foreach($files as $file) {
            array_push($fileNames, pathinfo($file)['filename']);
        }

        $maintenances = ViewNextMaintenances::select("*")
                        ->get()
                        ->toArray();

        return Inertia::render('Report/MaintenanceReport', ['maintenances' => $maintenances, 'filenames' => $fileNames]);
    }

    public function generate(Request $request)
    {
        $maintenances = ViewNextMaintenances::select("*")
                                            ->get()
                                            ->toArray();

        $pdf = App::make('dompdf.wrapper');
        $html = View('report', ['maintenances' => $maintenances])->render();
        $pdf->loadHTML($html)->output();
        $pdf->save(storage_path('app/reports/'. auth()->user()->name . Carbon::now()->format('dmYhms') . '.pdf'));

        //$directory = storage_path('app/pdf/');
        //$files = File::allFiles($directory);
        
        //$fileNames = [];
    
        //foreach($files as $file) {
        //    array_push($fileNames, pathinfo($file)['filename']);
        //}

        //return response('Success', 200);
    
        //dd($fileNames);

        //$path = storage_path('app/pdf/Andre Bernardi31072023080710.pdf');
        //return response()->download($path);
    }

    public function print()
    {
        $directory = storage_path('app/pdf/');
        $files = File::allFiles($directory);
        
        $fileNames = [];

        foreach($files as $file) {
            array_push($fileNames, pathinfo($file)['filename']);
        }
    }

    public function download($maintenance_report)
    {
        //return response()->download(storage_path('app/public/' . $maintenance_report . '.pdf', $maintenance_report . '.pdf'));

        //return Inertia::render('Report/MaintenanceReport')->download(storage_path('app/reports/' . $maintenance_report . '.pdf'));

        //return Response::download(storage_path('app/public/' . $maintenance_report . '.pdf'));

        return response()->file(public_path($maintenance_report . '.pdf'),[
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="filename.pdf"',
         ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
