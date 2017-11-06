<?php

use Illuminate\Http\Request;
use App\Title;
use App\Group;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('title-create', 'TitleController@postCreateTitle');
Route::post('title-edit', 'TitleController@postEditTitle');

Route::post('user-create', 'UserController@postCreateUser');
Route::post('user-edit', 'UserController@postEditUser');

Route::post('customer-create', 'CustomerController@postCreateCustomer');
Route::post('customer-edit', 'CustomerController@postEditCustomer');

Route::post('group-create', 'GroupController@store');
Route::post('group-edit', 'GroupController@postEditGroup');
