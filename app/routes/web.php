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

use Illuminate\Http\Request;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// default route for laravel after login/recoverpassword
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/product/view/{product}', 'ProductsController@viewproduct')->name('viewproduct');
Route::get('/groups', 'GroupsController@index')->name('groups');
Route::get('/group/view/{group}', 'GroupsController@viewGroup')->name('viewGroup');
Route::get('/statistics', 'StatisticsController@index')->name('statistics');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/preferences', 'PreferencesController@index')->name('preferences');
    Route::get('/details', 'DetailsController@index')->name('details');
    Route::get('/myproducts', 'MyProductsController@index')->name('myproducts');
    Route::post('/group/join/{group}', 'GroupsController@store')->name('joinGroup');
    Route::get('/mygroups', 'MyGroupsController@index')->name('mygroups');
    Route::get('/details/editpassword', 'UsersController@editpassword')->name('editpassword');
    Route::post('/details/editpassword', 'UsersController@updatepassword')->name('editpassword');
    Route::get('/mypreferences', 'MyPreferencesController@index')->name('mypreferences');
});

Route::group(['prefix' => 'scripts'], function () {
    /*
    * Webhook script;
    * It is called by GitHub on every new push
    * This updates the server code to the latest code available on GitHub repo
    */
    Route::post('webhook', function(Request $request){
        // get request body
        $content = $request->getContent();

        // hash it with the key stored in APP_WEBHOOKKEY
        // it's the same key configured as a secret in GitHub webhook settings
        $hash = hash_hmac('sha1', $content, env('APP_WEBHOOKKEY'));

        // compare it with the one we have in X-Hub-Signature
        if($request->header('X-Hub-Signature') !== 'sha1=' . $hash)
        abort(403);

        // execute deploy command
        SSH::run([
            'cd /root/condr/app',
            '/root/.config/composer/vendor/laravel/envoy/envoy run deploy',
        ]);
    });

    Route::get('migrate', function () {
        Artisan::call('migrate:refresh');
        echo '<pre>' . Artisan::output() . '</pre>';
    });

    Route::get('seed', function () {
        Artisan::call('db:seed');
        echo '<pre>' . Artisan::output() . '</pre>';
    });

});
