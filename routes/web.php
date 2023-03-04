<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\FrontController;
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

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::get('admin/home',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('layouts.admin');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/location', LocationController::class);
    Route::resource('/rumah', RumahController::class);
    Route::resource('/image', ImageController::class);
    Route::resource('/kota', KotaController::class);
    Route::resource('/kecamatan', KecamatanController::class);
    Route::resource('/kelurahan', KelurahanController::class);
    Route::get('getKecamatan/{id}', [RumahController::class, 'getKecamatan']);
    Route::get('getKelurahan/{id}', [RumahController::class, 'getKelurahan']);



});
// Route::resource('/location', LocationController::class);
// Route::resource('/rumah', RumahController::class);

Auth::routes();
// Route::get('/', [FrontController::class, 'rumahuser']);
Route::get('/', [FrontController::class, 'frontend']);
Route::get('/detail/{id}', [FrontController::class, 'detail']);
