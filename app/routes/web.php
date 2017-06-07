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
use Illuminate\Support\Facades\Input;

Auth::routes();

Route::get('/', function () {
    return view('static.home');
});

Route::get('/statistics', 'StatisticsController@index')->name('statistics');

Route::any('/lookup/{upc_code}', 'LookupController@addProduct')->name('lookup');

Route::any('/populate', 'LookupController@populateProducts')->name('populate');

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {

Route::post('/vote_characteristic', 'AjaxController@voteCharacteristic')->name('vote');

});

Route::any('/products', [
    'uses' => 'ProductsController@getProductsList',
    'as'   => 'products.listproducts'
]);

Route::get('/product/{products}', [
    'uses' => 'ProductsController@getProduct',
    'as'   => 'products.singleview'
]);

Route::any('/products/add', [
    'uses' => 'ProductsController@addProduct',
    'as'   => 'products.add'
]);

Route::any('/products/submit', [
    'uses' => 'ProductsController@submitAddProduct',
    'as'   => 'products.submitAdd'
]);

Route::any('/groups', [
    'uses' => 'GroupsController@getGroupsList',
    'as'   => 'groups.listgroups'
]);

Route::any('/group/{groups}', [
    'uses' => 'GroupsController@getGroup',
    'as'   => 'groups.singleview'
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

    /**
     * My products routes
     * GET             /my/products
     * GET or POST     /my/product/{id}/add
     * DELETE          /my/product/{id}/delete
     */

    Route::get('products', [
        'uses' => 'User\UserProductsController@getFavoriteProducts',
        'as'   => 'products.listproducts'
    ]);

    Route::match(['get', 'post'], 'product/{id}/add', [
        'uses' => 'User\UserProductsController@addFavoriteProduct',
        'as'   => 'product.add'
    ]);

    Route::delete('product/{id}/delete', [
        'uses' => 'User\UserProductsController@deleteFavoriteProduct',
        'as'   => 'product.delete'
    ]);

    /**
     * My groups routes
     * GET             /my/groups
     * GET or POST     /my/group/{id}/add
     * DELETE          /my/group/{id}/delete
     */
    Route::get('groups', [
        'uses' => 'User\UserGroupsController@getFavoriteGroups',
        'as'   => 'groups.listgroups'
    ]);

    Route::match(['get', 'post'], 'group/{id}/add', [
        'uses' => 'User\UserGroupsController@addFavoriteGroup',
        'as'   => 'group.add'
    ]);

    Route::delete('group/{id}/delete', [
        'uses' => 'User\UserGroupsController@deleteFavoriteGroup',
        'as'   => 'group.delete'
    ]);

    /**
     * My products routes
     * GET             /my/products
     * GET or POST     /my/product/{id}/add
     * DELETE          /my/product/{id}/delete
     */
    Route::get('preferences', [
        'uses' => 'User\UserPreferencesController@getFavoritePreferences',
        'as'   => 'preferences.listpreferences'
    ]);

    Route::match(['get', 'post'], 'preferences/add/{id}/{value}', [
        'uses' => 'User\UserPreferencesController@addFavoritePreference',
        'as'   => 'preferences.add'
    ]);

    Route::get('preferences/add', [
        'uses' => 'User\UserPreferencesController@getAddFavoritePreference',
        'as'   => 'preferences.addbyyourself'
    ]);

    Route::post('preferences/add', [
        'uses' => 'User\UserPreferencesController@postAddFavoritePreference',
        'as'   => 'preferences.addbyyourself.submit'
    ]);

    Route::get('preferences/{id}/{cvalue}/delete', [
        'uses' => 'User\UserPreferencesController@deleteFavoritePreference',
        'as'   => 'preferences.delete'
    ]);

    Route::any('preferences/searchby', [
        'uses' => 'User\UserPreferencesController@searchByFavoritePreferences',
        'as'   => 'preferences.searchby'
    ]);

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
