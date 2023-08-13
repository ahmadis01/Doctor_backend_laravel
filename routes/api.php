<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\IllnessController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\WorkPlaceController;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;



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

Route::get('/migrate', function(){
    Artisan::call('migrate');
    dd('migrated!');
});
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

//Specialization
Route::resource('/specialization', SpecializationController::class);

//Date
Route::resource('/date',DateController::class);

//Illness
Route::resource('/illness', IllnessController::class);

//Account
Route::post('/register',[AccountController::class,'register']);
Route::post('/login',[AccountController::class,'login']);

//Medicine
Route::resource('/medicine',MedicineController::class);

//Prescription
Route::resource('/prescription', PrescriptionController::class);

//workplace
Route::resource('/workPlace' , WorkPlaceController::class);