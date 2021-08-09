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


Route::resource('clubs', ClubAPIController::class);




Route::resource('fields', FieldAPIController::class);




Route::resource('starts', StartAPIController::class);


Route::resource('users', UserAPIController::class);




Route::resource('holes', HoleAPIController::class);


Route::resource('field_start_defaults', FieldStartDefaultAPIController::class);




Route::resource('user_clubs', UserClubAPIController::class);


















Route::resource('user_players', UserPlayerAPIController::class);


Route::resource('user_fields', UserFieldAPIController::class);


Route::resource('user_scores', UserScoreAPIController::class);
