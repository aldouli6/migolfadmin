<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('countries', App\Http\Controllers\CountryController::class);


Route::resource('states', App\Http\Controllers\StateController::class);










Route::resource('clubs', App\Http\Controllers\ClubController::class);




Route::resource('fields', App\Http\Controllers\FieldController::class);


Route::resource('startColors', App\Http\Controllers\StartColorController::class);




Route::resource('starts', App\Http\Controllers\StartController::class);


Route::resource('users', App\Http\Controllers\UserController::class);












Route::resource('roles', App\Http\Controllers\RoleController::class);




Route::resource('holes', App\Http\Controllers\HoleController::class);


Route::resource('fieldStartDefaults', App\Http\Controllers\FieldStartDefaultController::class);




Route::resource('userClubs', App\Http\Controllers\UserClubController::class);


















Route::resource('userPlayers', App\Http\Controllers\UserPlayerController::class);


Route::resource('userFields', App\Http\Controllers\UserFieldController::class);


Route::resource('userPlayers', App\Http\Controllers\UserPlayerController::class);
