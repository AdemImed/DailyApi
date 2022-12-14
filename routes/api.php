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
    Route::get('rooms','index');
    Route::post('rooms','store');
    Route::get('rooms/{room_name}','show');
    Route::post('rooms/{room_name}','update');
    Route::delete('rooms/{room_name}','destroy');
});

Route::controller(\App\Http\Controllers\Api\V1\MeetingToken\MeetingTokenController::class)->group(function (){
    Route::post('meeting-tokens','createTokenFromApi');
    Route::post('self-signed-token','generateSelfSignedToken')->name('generateSelfSignedToken');
    Route::get('meeting-tokens/{meeting_token}','validateTokenFromApi');
});

Route::get('domains', \App\Http\Controllers\Api\V1\Domain\DomainController::class);
Route::get('meetings', \App\Http\Controllers\Api\V1\Meeting\MeetingController::class);
Route::get('presence', \App\Http\Controllers\Api\V1\Presence\PresenceController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
