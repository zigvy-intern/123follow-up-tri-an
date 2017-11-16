<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\City;
use App\Dictrict;
use App\Ward;
use App\DetailHotel;
use App\TypeRoom;


use Illuminate\Http\Request;

class BookHotelController extends Controller
{
    public function getHotel(Request $req)
    {
        $city = City::all();
        $dictrict = Dictrict::all();
        $ward = Ward::all();
        $bookHotel = Hotel::all();
        return view('bookhotel.book-hotel', compact('city', 'dictrict', 'ward', 'bookHotel'));
    }

    public function getHotelDetail(Request $req)
    {
        $getHotel = Hotel::where('id', $req->id)->first();
        $hotelDetail = DetailHotel::where('hotel_id', $req->id)->first();
        $hotelData = $hotelDetail->getHotelViewData();
        $hotelData['hotel_slide'] = explode(',', $hotelData['hotel_slide']);

        return view('bookhotel.hotel-modal', compact('hotelDetail', 'getHotel'), $hotelData);
    }
    public function getTypeRoom(Request $req)
    {
        $getDetail = DetailHotel::where('id', $req->id)->first();
        $typeRoom = TypeRoom::where('id_detail', $req->id)->first();
        $roomData = $typeRoom->getTypeViewData();

        return view('bookhotel.hotel-modal', compact('getDetail', 'typeRoom'), $roomData);
    }
    public function getNewHotel(Request $req)
    {
        $newHotel = new Hotel();
        $newHotel->hotel_name = $req->hotelName;
        $newHotel->hotel_image = $req->avatar;
        $newHotel->save();
        $newHotel_id = $newHotel->id;

        echo json_encode(Hotel::find($group_id));
    }
}
