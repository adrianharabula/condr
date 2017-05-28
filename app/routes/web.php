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

Route::any('/products', [
    'uses' => 'ProductsController@getProductsList',
    'as'   => 'products.listproducts'
]);

Route::get('/product/{products}', [
    'uses' => 'ProductsController@getProduct',
    'as'   => 'products.singleview'
]);

Route::group(['middleware' => 'auth', 'prefix' => 'my', 'as' => 'my.'], function () {

    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::get('/', [
          'uses' => 'User\UserSettingsController@index',
          'as' => 'index'
        ]);

        Route::get('change-password', [
            'uses' => 'User\UserSettingsController@getEditPassword',
            'as' => 'change-password'
        ]);

        Route::post('change-password', [
            'uses' => 'User\UserSettingsController@postEditPassword',
            'as' => 'change-password'
        ]);
    });

    Route::get('products', [
        'uses' => 'User\UserProductsController@getFavoriteProducts',
        'as'   => 'products.listproducts'
    ]);

    Route::post('product/{id}', [
        'uses' => 'User\UserProductsController@addFavoriteProduct',
        'as'   => 'product.add'
    ]);

    Route::delete('product/{id}', [
        'uses' => 'User\UserProductsController@deleteFavoriteProduct',
        'as'   => 'product.delete'
    ]);

});

Route::get('/groups', 'GroupsController@index')->name('groups');
Route::post('/groups', 'GroupsController@search')->name('groups');
Route::get('/group/view/{group}', 'GroupsController@viewGroup')->name('viewGroup');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/preferences', 'PreferencesController@index')->name('preferences');
    Route::post('/mypreferences/add/{characteristic}', 'MyPreferencesController@store')->name('addcharacteristics');
    Route::get('/group/join/{group}', 'GroupsController@store')->name('joinGroup');
    Route::get('/mygroups', 'MyGroupsController@index')->name('mygroups');
    Route::get('/mygroups/delete/{group}', 'MyGroupsController@delete')->name('groupdelete');
    Route::get('/my-account/preferences', 'PreferencesController@index')->name('preferences');
    Route::get('/preferences/suggestion', 'PreferencesController@suggestion')->name('suggestion');
    Route::get('/mypreferences', 'MyPreferencesController@index')->name('mypreferences');
    Route::get('/mypreferences/addpreferences', 'MyPreferencesController@addPreferences')->name('addpreferences');

});

/**
 * Admin routes if ever we'll need one
 */
/*Route::group(array('prefix' => 'admin', 'before' => 'auth'), function() {
});*/

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
