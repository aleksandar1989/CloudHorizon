<?php

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
Route::get('/', 'HomeController@index');

Auth::routes();


Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function() {
    // Admin Dashboard
    Route::get('/', 'HomeController@index', ['middleware' => 'admin']);
    // Admin manage users
    Route::resource('/users', 'UsersController', ['middleware' => 'admin']);
    // Admin manage Admissions
    Route::resource('/admissions', 'AdmissionsController', ['middleware' => 'adminOrStaff']);
    // Admin manage interviews
    Route::resource('/interviews', 'InterviewsController', ['middleware' => 'admin']);
    // Admin manage types
    Route::resource('/types', 'TypesController', ['middleware' => 'admin']);
});

