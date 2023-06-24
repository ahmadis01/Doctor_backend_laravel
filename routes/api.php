<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Doctor
Route::resource('/doctor',DoctorController::class);


//Patient
Route::resource('/patient',PatientController::class);

//City
Route::resource('/city',CityController::class);

//Address
Route::resource('/address', AddressController::class);
Route::get('/address/getByCityId/{cityId}',[AddressController::class ,'getAddressesByCityId']);

//Laboratory
Route::resource('/laboratory' , LaboratoryController::class);

//Analysis
Route::resource('/analysis', AnalysisController::class);