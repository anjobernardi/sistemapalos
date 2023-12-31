<?php

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

Route::get('sesion', function () {
	return session()->all();
});

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap')->name('lang.swap');

Route::get('logout', function () {
	app(\App\Http\Controllers\Auth\LoginController::class)->logout(request());
});

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();
Route::get('register', function () {
	return redirect('/');
})->name('register');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('companies', 'CompaniesController');
	Route::resource('employees', 'EmployeesController');
	Route::resource('equipments', 'EquipmentsController');
	Route::resource('serviceorders', 'ServiceOrdersController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
