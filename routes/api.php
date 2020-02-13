<?php

use Illuminate\Http\Request;

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

// Admin routes

Route::get('/employees', 'AdminController@getEmployees')->name('admin');

Route::post('/employee/save/{id?}', 'AdminController@saveEmployee')->name('saveEmployee');
Route::delete('/employee/remove/{id}', 'AdminController@removeEmployee')->name('removeEmployee');
Route::post('/employee/update/{id}', 'AdminController@updateEmployee')->name('updateEmployee');
