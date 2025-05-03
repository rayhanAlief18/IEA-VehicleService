<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vehicleController;
use App\Http\Controllers\jenisKendaraanController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/createVehicle',[
    vehicleController::class,
    'createVehicle'
]);
Route::get('getVehicle',[
    vehicleController::class,
    'index'
]);

Route::get('getVehicle/{id}',[
    vehicleController::class,
    'getVehicleById'
]);

Route::get('vehicle/{id}/order',[
    vehicleController::class,
    'getVehicleByOrder'
]);


Route::get('getJenisKendaraan',[
    jenisKendaraanController::class,
    'index'
]);
Route::post('createJenisKendaraan',[
    jenisKendaraanController::class,
    'createJenisKendaraan'
]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
