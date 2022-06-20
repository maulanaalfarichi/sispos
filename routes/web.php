<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::group([
    'namespace' => 'Front'
], function() {

    Route::get('/', 'Home@index');
    Route::get('/informations', 'Information@index');
    Route::get('/incidents', 'Incident@index');
    Route::get('/contact', 'Contact@index');
    Route::post('/contact', 'Contact@create');

});
