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
    return view('welcome');
});

// Route::get('admin',[
// 	'as' => 'adminpage',
// 	'middleware' => 'auth',
// 	function(){
// 		return view('admin.index');
// 	}
// ]);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return view('admin.index');
        });
        // Route::group(['prefix' => 'tours'],function() {
        // 	Route::get('tour',[
        // 		'as' => 'tours',
        // 		'uses' => 'TourController@getTour'
        // 	]);
        // });

        // Route::group(['prefix' => 'hotel'],function() {
        // });

        // Route::group(['prefix' => 'flight'],function() {
        // });
    });
});

Route::get('admin-title', [ 'as' => 'title', 'uses' => 'AdminController@getTitle'
]);
Route::get('admin-user', [ 'as' => 'user', 'uses' => 'AdminController@getUser'
]);
Route::get('admin-group', [ 'as' => 'group', 'uses' => 'AdminController@getGroup'
]);
Route::get('admin-role', [ 'as' => 'role', 'uses' => 'AdminController@getRole'
]);
Route::get('customer', [ 'as' => 'customer', 'uses' => 'AdminController@getCustomer'
]);
Route::get('admin-account', [ 'as' => 'accountSetting', 'uses' => 'AdminController@getAccountSetting'
]);
Route::get('admin-login', [ 'as' => 'login', 'uses' => 'LoginController@getLogin'
]);
Route::post('admin-login', [ 'as' => 'login', 'uses' => 'LoginController@postLogin'
]);
Route::get('admin-logout', [ 'as' => 'logout', 'uses' => 'LoginController@getLogout'
]);
Route::get('del-title/{id}', [ 'as' => 'deleteTitle', 'uses' => 'DeleteController@getDeleteTitle'
]);
Route::get('del-user/{id}', [ 'as' => 'deleteUser', 'uses' => 'DeleteController@getDeleteUser'
]);
Route::get('del-group/{id}', [ 'as' => 'deleteGroup', 'uses' => 'DeleteController@getDeleteGroup'
]);
Route::get('del-customer/{id}', [ 'as' => 'deleteCustomer', 'uses' => 'DeleteController@getDeleteCustomer'
]);
Route::get('change-password', ['as' => 'formPassword', 'uses' => 'PasswordController@getChangePassword'
]);
Route::post('change-password', ['as' => 'updatePassword', 'uses' => 'PasswordController@postChangePassword'
]);
Route::get('tour-layout', ['as' => 'tourLayout', 'uses' => 'TourController@getTour'
]);
Route::get('tour-detail/{id}', ['as' => 'tourDetail', 'uses' => 'TourController@getTourDetail'
]);
