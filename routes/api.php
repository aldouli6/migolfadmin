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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});










Route::resource('clubs', App\Http\Controllers\API\ClubAPIController::class);




Route::resource('fields', App\Http\Controllers\API\FieldAPIController::class);




Route::resource('starts', App\Http\Controllers\API\StartAPIController::class);


Route::resource('users', App\Http\Controllers\API\UserAPIController::class);




Route::resource('holes', App\Http\Controllers\API\HoleAPIController::class);


Route::resource('field_start_defaults', App\Http\Controllers\API\FieldStartDefaultAPIController::class);




Route::resource('user_clubs', App\Http\Controllers\API\UserClubAPIController::class);


















Route::resource('user_players', App\Http\Controllers\API\UserPlayerAPIController::class);


Route::resource('user_fields', App\Http\Controllers\API\UserFieldAPIController::class);
