<?php

use Illuminate\Http\Request;
use App\Title;
use App\Group;
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

Route::post('group-create', 'GroupController@store');
Route::post('user-create', 'UserController@store');
