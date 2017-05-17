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

// see https://github.com/adrianharabula/condr/issues/67
// for more info on this routes
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// default route for laravel after login/recoverpassword
Route::get('/home', function () {
  return redirect()->route('home');
});

Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/groups', 'GroupsController@index')->name('groups');
Route::get('/statistics', 'StatisticsController@index')->name('statistics');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/preferences', 'PreferencesController@index')->name('preferences');
  Route::get('/details', 'DetailsController@index')->name('details');
  Route::get('/myproducts', 'MyProductsController@index')->name('myproducts');
  Route::get('/mygroups', 'MyGroupsController@index')->name('mygroups');
  Route::get('/details/editpassword', 'UsersController@editpassword')->name('editpassword');
  Route::get('/mypreferences', 'MyPreferencesController@index')->name('mypreferences');
});
