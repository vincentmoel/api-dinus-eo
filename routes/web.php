<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\RoomController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->middleware('revalidate');
Route::post('/login',[AuthController::class,'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/logout', function () { return redirect('/'); });

Route::group(['middleware' => ['guest', 'revalidate']], function () {
    Route::get('/login',[AuthController::class,'index'])->name('login');
    
});


Route::group(['middleware' => ['auth', 'revalidate']], function () {
    Route::resource('events', EventController::class)->except('show','create');
    Route::resource('rooms', RoomController::class)->except('show','create');
    Route::resource('buildings', BuildingController::class)->except('show','create');
});


Route::get('/date',[HomeController::class,'date']);
Route::get('/schedules',[EventController::class,'schedules']);
Route::post('/schedules-refresh',[EventController::class,'schedules_refresh']);


    