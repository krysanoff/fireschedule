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
Auth::routes(['verify' => true]);

// Public routes
Route::middleware('verified')->prefix('')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/shift/{shift}', 'GraphController@getLastGraph')->name('graph')->where('name', '[1-4]+');
    Route::post('/graph/save', 'GraphController@saveGraph');
});

// Admin routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
});

/**
 * For passing localization data in JS
 *
 * @link https://medium.com/@serhii.matrunchyk/using-laravel-localization-with-javascript-and-vuejs-23064d0c210e
 */
Route::get('/js/lang.js', function () {
    $strings = Cache::rememberForever('lang.js', function () {
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

        return $strings;
    });

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');
