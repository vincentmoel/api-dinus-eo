<?php

use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\HomeController;
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

Route::get('/home',[HomeController::class,'index']);
Route::get('/events/{event:event_id}',[EventController::class,'show']);