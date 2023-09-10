<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    /*
    Route::get('/', function () {
        phpinfo();
    })->middleware(['auth', 'verified'])->name('home');
    */

    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, "index"])->name('dashboard.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::group(
        [
            "prefix" => "maintenance",
        ],
        function () {

            Route::get("/", [\App\Http\Controllers\MaintenanceController::class, "index"])->name("maintenance.index");                
    
            Route::get("/create_maintenance", [\App\Http\Controllers\MaintenanceController::class, "create"])->name("create_maintenance.create");
            Route::get("/create_maintenance/{maintenance}", [\App\Http\Controllers\MaintenanceController::class, "edit"])->name("create_maintenance.edit");
            Route::post("/create_maintenance", [\App\Http\Controllers\MaintenanceController::class, "store"])->name("create_maintenance.store");
            Route::delete("/create_maintenance/{maintenance}", [\App\Http\Controllers\MaintenanceController::class, "destroy"])->name("create_maintenance.destroy");
        }
    );

    Route::group(
        [
            "prefix" => "equipment_situation",
        ],
        function () {

            Route::get("/", [\App\Http\Controllers\EquipmentSituationController::class, "index"])->name("equipment_situation.index");                
    
            Route::get("/create_equipment_situation", [\App\Http\Controllers\EquipmentSituationController::class, "create"])->name("create_equipment_situation.create");
            Route::get("/create_equipment_situation/{equipment_situation}", [\App\Http\Controllers\EquipmentSituationController::class, "edit"])->name("create_equipment_situation.edit");
            Route::post("/create_equipment_situation", [\App\Http\Controllers\EquipmentSituationController::class, "store"])->name("create_equipment_situation.store");
            Route::delete("/create_equipment_situation/{equipment_situation}", [\App\Http\Controllers\EquipmentSituationController::class, "destroy"])->name("create_equipment_situation.destroy");
        }
    );


    Route::group(
        [
            "prefix" => "status_service_order",
        ],
        function () {

            Route::get("/", [\App\Http\Controllers\StatusServiceOrderController::class, "index"])->name("status_service_order.index");                
    
            Route::get("/create_status_service_order", [\App\Http\Controllers\StatusServiceOrderController::class, "create"])->name("create_status_service_order.create");
            Route::get("/create_status_service_order/{status_service_order}", [\App\Http\Controllers\StatusServiceOrderController::class, "edit"])->name("create_status_service_order.edit");
            Route::post("/create_status_service_order", [\App\Http\Controllers\StatusServiceOrderController::class, "store"])->name("create_status_service_order.store");
            Route::delete("/create_status_service_order/{status_service_order}", [\App\Http\Controllers\StatusServiceOrderController::class, "destroy"])->name("create_status_service_order.destroy");
        }
    );

    Route::group(
        [
            "prefix" => "equipment",
        ],
        function () {

            Route::get("/", [\App\Http\Controllers\EquipmentController::class, "index"])->name("equipment.index");                
    
            Route::get("/create_equipment", [\App\Http\Controllers\EquipmentController::class, "create"])->name("create_equipment.create");
            Route::get("/create_equipment/{equipment}", [\App\Http\Controllers\EquipmentController::class, "edit"])->name("create_equipment.edit");
            Route::post("/create_equipment", [\App\Http\Controllers\EquipmentController::class, "store"])->name("create_equipment.store");
            Route::delete("/create_equipment/{equipment}", [\App\Http\Controllers\EquipmentController::class, "destroy"])->name("create_equipment.destroy");
        }
    );

    Route::group(
        [
            "prefix" => "part",
        ],
        function () {
            
            Route::post("/", [\App\Http\Controllers\PartController::class, "store"])->name("part.store");
            Route::get("/{part}", [\App\Http\Controllers\PartController::class, "edit"])->name("part.edit");
            Route::delete("/{part}", [\App\Http\Controllers\PartController::class, "destroy"])->name("part.destroy");
        }
    );

    Route::group(
        [
            "prefix" => "plan",
        ],
        function () {
            
            Route::post("/", [\App\Http\Controllers\PlanController::class, "store"])->name("plan.store");
            Route::delete("/{plan}", [\App\Http\Controllers\PlanController::class, "destroy"])->name("plan.destroy");
        }
    );

    Route::group(
        [
            "prefix" => "service_order",
        ],
        function () {

            Route::get("/", [\App\Http\Controllers\ServiceOrderController::class, "index"])->name("service_order.index");                
    
            Route::get("/create_service_order", [\App\Http\Controllers\ServiceOrderController::class, "create"])->name("create_service_order.create");
            Route::get("/create_service_order/{service_order}", [\App\Http\Controllers\ServiceOrderController::class, "edit"])->name("create_service_order.edit");
            Route::post("/create_service_order", [\App\Http\Controllers\ServiceOrderController::class, "store"])->name("create_service_order.store");
            Route::patch("/create_service_order/{service_order}", [\App\Http\Controllers\ServiceOrderController::class, "close"])->name("create_service_order.close");
            Route::delete("/create_service_order/{service_order}", [\App\Http\Controllers\ServiceOrderController::class, "destroy"])->name("create_service_order.destroy");
        }
    );

    Route::group(
        [
            "prefix" => "maintenance_report",
        ],
        function () {

            Route::get("/", [\App\Http\Controllers\ReportController::class, "index"])->name("maintenance_report.index");
            Route::get('/generate', [\App\Http\Controllers\ReportController::class, 'generate'])->name('maintenance_report.generate');
            Route::get('/download/{maintenance_report}', [\App\Http\Controllers\ReportController::class, 'download'])->name('maintenance_report.download');

        }
    );
});

require __DIR__.'/auth.php';
