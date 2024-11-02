<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [AdminController::class, 'index'])->middleware(['admin','auth']);

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/hospitals', HospitalController::class);
    Route::resource('/doctors', DoctorController::class);
    Route::resource('/patients', PatientController::class);
});

Route::get('/', [PageController::class, 'index'])->name('/');

// Search routes    
Route::get('/search-data', [AdminController::class, 'search']);
Route::get('/search-hospital', [HospitalController::class, 'search']);
Route::get('/search-doctor', [DoctorController::class, 'search']);
Route::get('/search-patient', [PatientController::class, 'search']);

//PDF REPORT GENERATOR
Route::get('patient-report/{patient}', [PatientController::class, 'report'])->name('patient.report');