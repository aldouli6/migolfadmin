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
    Route::resource('tee_colors', TeeColorAPIController::class);
    Route::resource('course_tee_defaults', CourseTeeDefaultAPIController::class);
    Route::resource('user_courses', UserCourseAPIController::class);
    Route::resource('user_handicap_indices', UserHandicapIndexAPIController::class);
    Route::resource('user_hole_raitings', UserHoleRaitingAPIController::class);
    Route::resource('user_groups', UserGroupAPIController::class);
    Route::resource('bets', BetAPIController::class);
    Route::resource('bet_match_individuals', BetMatchIndividualAPIController::class);
    Route::resource('bet_medal_plays', BetMedalPlayAPIController::class);
    Route::resource('bet_stablefords', BetStablefordAPIController::class);
    Route::resource('bet_rompe_handicaps', BetRompeHandicapAPIController::class);
    Route::resource('bet_match_parejas', BetMatchParejaAPIController::class);
    Route::resource('bet_skins', BetSkinAPIController::class);
    Route::resource('bet_greens', BetGreenAPIController::class);
    Route::resource('bet_raya_puntos', BetRayaPuntoAPIController::class);
    Route::get('/usuario/{usuario}', 'CallController@usuario');
    Route::get('/perfil/{usuario}', 'CallController@perfil');
    Route::get('/miscampos/{usuario}', 'CallController@miscampos');
    Route::get('/campos/{usuario}', 'CallController@campos');
    Route::get('/campo/{course}/{usuario}', 'CallController@campo');
    Route::post('/update_offline', 'CallController@updateOffline');
});



Route::get('/countries', 'CountryStateAPIController@countries');
Route::get('/states/{id}', 'CountryStateAPIController@states');
Route::get('/courses', 'CourseAPIController@index');
Route::get('/clubs', 'ClubAPIController@index');
Route::get('/tees', 'TeeAPIController@index');

 









