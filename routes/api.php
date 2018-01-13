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

Route::post('profile-create', 'UserController@postCreateProfile');
Route::post('profile-edit', 'UserController@postEditProfile');

Route::post('customer-create', 'CustomerController@postCreateCustomer');
Route::post('customer-edit', 'CustomerController@postEditCustomer');

Route::post('role-create', 'RoleController@postCreateRole');
Route::post('role-edit', 'RoleController@postEditRole');

Route::post('booktour-create', 'TourController@postCreateBookTour');
Route::post('booktour-edit', 'TourController@postEditBookTour');

Route::post('addtour-create', 'TourController@postCreateAddTour');
Route::post('addtour-edit', 'TourController@postEditAddTour');

Route::post('tourinfo-edit', 'TourController@postEditTourInfo');

Route::post('hotelinfo-edit', 'HotelController@postEditHotelInfo');

Route::post('addhotel-create', 'HotelController@postCreateAddHotel');
Route::post('addhotel-edit', 'HotelController@postEditAddHotel');
Route::get('addhotel-get-detail/{hotel_id}', 'HotelController@getDetailHotel');

Route::post('bookhotel-create', 'HotelController@postCreateBookHotel');
Route::post('bookhotel-edit', 'HotelController@postEditBookHotel');
Route::get('bookhotel-get-detail/{bookhotel_id}', 'HotelController@getDetailBookHotel');

Route::post('room-create', 'HotelController@postCreateRoom');
Route::post('room-edit', 'HotelController@postEditRoom');
Route::get('room-get-room/{room_id}', 'HotelController@getRoom');

Route::get('location-district', 'HotelController@getLocationDistrict');
Route::get('location-ward', 'HotelController@getLocationWard');
Route::get('get-hotel', 'HotelController@getFilterHotel');
Route::get('get-type-room', 'HotelController@getFilterTypeRoom');
Route::get('get-hotel-room', 'HotelController@getHotelRoom');
Route::get('get-hotel-name', 'StatisticController@getHotelName');
Route::get('get-info-hotel/{get_hotel_id}', 'StatisticController@getInfoHotel');
