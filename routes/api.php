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

Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::post('/register', 'AuthController@register');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api'])->group(function(){
    Route::resource('clubs', ClubAPIController::class);
    Route::resource('users', UserAPIController::class);
    Route::resource('holes', HoleAPIController::class);
    Route::resource('user_clubs', UserClubAPIController::class);
    Route::resource('user_players', UserPlayerAPIController::class);
    Route::resource('courses', CourseAPIController::class);
    Route::resource('tees', TeeAPIController::class);
    Route::resource('course_tee_defaults', CourseTeeDefaultAPIController::class);
    Route::resource('user_courses', UserCourseAPIController::class);
    Route::resource('user_handicap_indices', UserHandicapIndexAPIController::class);
    Route::resource('user_hole_raitings', UserHoleRaitingAPIController::class);
    Route::get('/usuario/{usuario}', 'CallController@usuario');
    Route::get('/perfil/{usuario}', 'CallController@perfil');
    Route::get('/miscampos/{usuario}', 'CallController@miscampos');
    Route::get('/campos/{country}', 'CallController@campos');
});

Route::get('/countries', 'CountryStateAPIController@countries');
Route::get('/states/{id}', 'CountryStateAPIController@states');
Route::get('/courses', 'CourseAPIController@index');
Route::get('/clubs', 'ClubAPIController@index');
Route::get('/tees', 'TeeAPIController@index');

 
