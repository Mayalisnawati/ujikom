<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\ImageController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('layouts.admin');
    });
    Route::resource('/location', LocationController::class);
    Route::resource('/rumah', RumahController::class);
    Route::resource('/image', ImageController::class);

});
// Route::resource('/location', LocationController::class);
// Route::resource('/rumah', RumahController::class);

Auth::routes();
Route::get('/rumah', [FrontController::class, 'rumahuser']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
