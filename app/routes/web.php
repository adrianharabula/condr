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

Route::get('/', function () {
    return view('static.home');
});
Route::group(['prefix' => '/products', 'as' => 'products.'], function () {
    Route::any('/', [
        'uses' => 'ProductsController@getProductsList',
        'as'   => 'list'
    ]);
    Route::get('/{product}', [
        'uses' => 'ProductsController@getProduct',
        'as'   => 'view'
    ]);
});

Route::group(['middleware' => 'auth', 'prefix' => '/my-products', 'as' => 'myProducts.'], function () {
    Route::get('/', [
        'uses' => 'User\UserProductsController@getFavoriteProducts',
        'as'   => 'list'
    ]);
    Route::post('{id}', [
        'uses' => 'User\UserProductsController@postToggleFavoriteProduct',
        'as'   => 'toggle'
    ]);

});
Route::get('/groups', 'GroupsController@index')->name('groups');
Route::post('/groups', 'GroupsController@search')->name('groups');

Route::get('/group/view/{group}', 'GroupsController@viewGroup')->name('viewGroup');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/preferences', 'PreferencesController@index')->name('preferences');
    Route::get('/details', 'DetailsController@index')->name('details');
    Route::get('/myproducts', 'MyProductsController@index')->name('myproducts');
    Route::post('/myproducts/add/{product}', 'MyProductsController@store')->name('addproduct');
    Route::post('/myproducts/delete/{product}', 'MyProductsController@delete')->name('deleteproduct');
    Route::post('/mypreferences/add/{characteristic}', 'MyPreferencesController@store')->name('addcharacteristics');
    Route::get('/group/join/{group}', 'GroupsController@store')->name('joinGroup');
    Route::get('/mygroups', 'MyGroupsController@index')->name('mygroups');
    Route::get('/mygroups/delete/{group}', 'MyGroupsController@delete')->name('groupdelete');
    Route::get('/details/editpassword', 'UserSettingsController@editpassword')->name('editpassword');
    Route::get('/details/preferences', 'PreferencesController@index')->name('preferences');
    Route::get('/preferences/suggestion', 'PreferencesController@suggestion')->name('suggestion');
    Route::post('/details/editpassword', 'UserSettingsController@updatepassword')->name('editpassword');
    Route::get('/mypreferences', 'MyPreferencesController@index')->name('mypreferences');
    Route::get('/mypreferences/addpreferences', 'MyPreferencesController@addPreferences')->name('addpreferences');

});

Route::group(['prefix' => 'scripts'], function () {
    /*
    * Webhook script;
    * It is called by GitHub on every new push
    * This updates the server code to the latest code available on GitHub repo
    */
    Route::post('webhook', function (Request $request) {
        // get request body
        $content = $request->getContent();

        // hash it with the key stored in APP_WEBHOOKKEY
        // it's the same key configured as a secret in GitHub webhook settings
        $hash = hash_hmac('sha1', $content, env('APP_WEBHOOKKEY'));

        // compare it with the one we have in X-Hub-Signature
        if ($request->header('X-Hub-Signature') !== 'sha1='.$hash) {
            abort(403);
        }

        // execute deploy command
        SSH::run([
            'cd /root/condr',
            'git pull origin master',
            './version-update',
        ]);
    });

    Route::get('migrate', function () {
        Artisan::call('migrate:refresh');
        echo '<pre>'.Artisan::output().'</pre>';
    });

    Route::get('seed', function () {
        Artisan::call('db:seed');
        echo '<pre>'.Artisan::output().'</pre>';
    });

});
Route::get('{route}', function ($route) {
    return view('static.'.$route);
});
