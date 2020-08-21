<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['verified'])->group(function () {
    Route::get( '/home', 'HomeController@index' )->name( 'home' );

    Route::get( '/sports', 'SportsController@index' )->middleware( 'is_admin' );
    Route::get( '/halls', 'HallController@index' )->middleware( 'is_admin' );
    Route::get( '/users', 'UserController@index' )->middleware( 'is_admin' );
    Route::get( '/trainingtimes', 'TrainingTimeController@index' );
    Route::get( '/participations/{id}', 'ParticipationController@index' );
    Route::get( '/profile', 'UserController@myProfile' );
    Route::get( '/admin/trainingtimes/deletepast', 'AdminController@deletePastTrainingTimes' )->middleware( 'is_admin' );
    Route::get( '/admin/photos/deleteunused', 'AdminController@deleteUnusedPhotos' )->middleware( 'is_admin' );
});
