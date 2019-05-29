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
    return view('index');
})->name('index');
Route::get('/shift/{shift}', 'GraphController@getGraph')->name('graph')->where('name', '[1-4]+');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/employee/new', 'AdminController@newEmployee')->name('newEmployee');
    Route::get('/employee/{id}', 'AdminController@getEmployee')->name('employee');

    Route::post('/employee/save/{id?}', 'AdminController@saveEmployee')->name('saveEmployee');
    Route::delete('/employee/remove/{id}', 'AdminController@removeEmployee')->name('removeEmployee');
    Route::post('/employee/update/{id}', 'AdminController@updateEmployee')->name('updateEmployee');
});

Route::post('/graph/save', 'GraphController@saveGraph');
