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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/employee/new', 'AdminController@newEmployee')->name('newEmployee');
    Route::get('/employee/{id}', 'AdminController@getEmployee')->name('employee');

    Route::post('/employee/add', 'AdminController@addEmployee')->name('addEmployee');
    Route::delete('/employee/remove/{id}', 'AdminController@removeEmployee')->name('removeEmployee');
    Route::post('/employee/update/{id}', 'AdminController@updateEmployee')->name('updateEmployee');
});

