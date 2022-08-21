<?php

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

Route::post('login', [\App\Http\Controllers\Api\V1\Auth\AuthController::class, 'login'])->name('login');

Route::controller(\App\Http\Controllers\Api\V1\Room\RoomController::class)->group(function (){
    Route::get('rooms','getRooms');
    Route::post('tokens','createToken');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
