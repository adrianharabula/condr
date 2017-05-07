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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'Home@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/groups', 'GroupsController@index')->name('groups');
Route::get('/statistics', 'StatisticsController@index')->name('statistics');
Route::get('/preferences', 'PreferencesController@index')->name('preferences');
Route::get('/details', 'DetailsController@index')->name('details');
Route::get('/myproducts', 'MyProductsController@index')->name('myproducts');
Route::get('/mygroups', 'MyGroupsController@index')->name('mygroups');
Route::get('/mypreferences', 'MyPreferencesController@index')->name('mypreferences');
