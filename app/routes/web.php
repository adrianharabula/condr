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

// fix urls not generating correctly
URL::forceRootUrl(env('APP_URL', ''));
URL::forceSchema(env('APP_SCHEMA', 'http'));

Auth::routes();

Route::get('/home', 'HomeController@index');
