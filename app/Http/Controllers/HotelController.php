<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\City;
use App\District;
use App\Ward;
use App\HotelDetail;
use App\TypeRoom;
use App\HotelRoom;
use App\Status;
use App\BookHotel;
use DB;


use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function getHotel(Request $req)
    {
        $city = City::all();
        $district = District::all();
        $ward = Ward::all();
        $hotel = Hotel::all();
        $typeRoom = TypeRoom::all();
        $hotelRoom = HotelRoom::all();
        $status = Status::all();
        $bookHotel = BookHotel::all();
        $join_room = DB::table('type_room')
            ->leftJoin('hotel_room', 'type_room.id_type', '=', 'hotel_room.id')
            ->select('type_room.*', 'hotel_room.*')
            ->get();
        $join_hotel = DB::table('hotels')
            ->join('place_city', 'hotels.hotel_city_id', '=', 'place_city.matp')
            ->join('place_district', 'hotels.hotel_district_id', '=', 'place_district.maqh')
            ->join('place_ward', 'hotels.hotel_ward_id', '=', 'place_ward.xaid')
            ->leftJoin('hotel_room', function ($join) {
                $join->on('hotels.id', '=', 'hotel_room.hotel_id')
                     ->where('hotel_room.type_room_id', '=', 1);
            })
            ->select('hotels.*', 'place_city.*', 'place_district.*', 'place_ward.*', 'hotel_room.id AS hotel_room_id', 'hotel_room.room_price', 'hotel_room.hotel_id', 'hotel_room.type_room_id', 'hotel_room.room_numbers', 'hotel_room.room_status')
            ->paginate(6);
        $book_hotel = DB::table('book_hotel')
            ->join('hotels', 'book_hotel.id_hotel', '=', 'hotels.id')
            ->leftJoin('hotel_room', 'book_hotel.hotel_type_room', '=', 'hotel_room.id')
            ->select('book_hotel.*', 'hotel_room.id as hotel_room_id', 'hotel_room.room_numbers', 'hotel_room.room_booked', 'hotel_room.type_room_id', 'hotel_room.hotel_id', 'hotels.hotel_name', 'hotels.hotel_address', 'hotels.id as hotels_id')
            ->paginate(5);
        return view('hotel.hotel-layout', compact('city', 'district', 'ward', 'hotel', 'bookHotel', 'typeRoom', 'hotelRoom', 'status', 'join_hotel', 'book_hotel', 'join_room'));
    }

    public function getHotelDetail(Request $req)
    {
        $hotelRoom = DB::table('hotel_room')->where('hotel_id', $req->id)
            ->join('hotels', 'hotel_room.hotel_id', '=', 'hotels.id')
            ->select('hotel_room.*', 'hotels.*')
            ->first();
        $status = Status::all();
        $typeRoom = TypeRoom::all();
        $join_room = DB::table('type_room')
            ->join('hotel_room', 'type_room.id_type', '=', 'hotel_room.id')
            ->select('type_room.*', 'hotel_room.*')
            ->get();
        $hotel = DB::table('hotels')->where('id', $req->id)
            ->join('place_city', 'hotels.hotel_city_id', '=', 'place_city.matp')
            ->join('place_district', 'hotels.hotel_district_id', '=', 'place_district.maqh')
            ->join('place_ward', 'hotels.hotel_ward_id', '=', 'place_ward.xaid')
            ->select('hotels.*', 'place_city.*', 'place_district.*', 'place_ward.*')
            ->first();
        $hotelDetail = HotelDetail::where('id_hotel', $req->id)->first();
        $hotelData = $hotelDetail->getHotelViewData();
        $hotelData['hotel_slide'] = explode(',', $hotelData['hotel_slide']);

        return view('hotel.hoteldetail.hotel-detail', compact('hotelRoom', 'hotelDetail', 'hotel', 'join_room', 'status', 'typeRoom'), $hotelData);
    }
    public function postEditHotelInfo(Request $req)
    {
        $hotelDetail = HotelDetail::findOrFail($req->id);
        $file = [];
        if ($req->file('hotel_info_image')) {
            foreach ($req->file('hotel_info_image') as $media) {
                if (!empty($media)) {
                    $destinationPath = 'source\img\hotel';
                    $filename = $media->getClientOriginalName();
                    $media->move($destinationPath, $filename);
                    $file[] = $filename;
                }
            }
        }
        $hotelDetail->hotel_slide = implode(',', $file);
        $hotelDetail->id_hotel = $req->hotel_info_name;
        $hotelDetail->hotel_description = $req->hotel_info;
        $hotelDetail->save();
        echo json_encode(HotelDetail::find($req->id));
    }

    public function postCreateAddHotel(Request $req)
    {
        if ($req->hasFile('add_hotel_image')) {
            $image = $req->file('add_hotel_image');
            $base_name = $image->getClientOriginalName();
            $name = pathinfo($base_name, PATHINFO_FILENAME);
            $ext = $image->getClientOriginalExtension();
            $final_name = $name.'.'.$ext;
            $pathImage = $image->move(public_path('source\img\hotel'), $final_name);

            $hotel = new Hotel();

            $hotel->hotel_name = $req->add_hotel_name;
            $hotel->hotel_owner = $req->add_hotel_owner;
            $hotel->hotel_city_id = $req->add_hotel_city;
            $hotel->hotel_district_id = $req->add_hotel_district;
            $hotel->hotel_ward_id = $req->add_hotel_ward;
            $hotel->hotel_address = $req->add_hotel_address;
            $hotel->hotel_image = $final_name;
            $hotel->save();
            $hotel_id = $hotel->id;

            $hotel_detail = new HotelDetail();
            $hotel_detail->id_hotel = $hotel_id;
            $hotel_detail_id = $hotel_detail->id;
            $hotel_detail->save();
            echo json_encode(Hotel::find($hotel_id), HotelDetail::find($hotel_detail_id));
        }
    }
    public function postEditAddHotel(Request $req)
    {
        $hotel = Hotel::findOrFail($req->id);
        if ($req->hasFile('add_hotel_image')) {
            $image = $req->file('add_hotel_image');
            $base_name = $image->getClientOriginalName(); //a.png
            $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654
            $ext = $image->getClientOriginalExtension();
            $final_name = $name.'.'.$ext;
            $pathImage = $image->move(public_path('source\img\hotel'), $final_name);

            $hotel->hotel_name = $req->add_hotel_name;
            $hotel->hotel_owner = $req->add_hotel_owner;
            $hotel->hotel_city_id = $req->add_hotel_city;
            $hotel->hotel_district_id = $req->add_hotel_district;
            $hotel->hotel_ward_id = $req->add_hotel_ward;
            $hotel->hotel_address = $req->add_hotel_address;
            $hotel->hotel_image = $final_name;

            $hotel->save();
            echo json_encode(Hotel::find($req->id));
        }
    }
    public function getDeleteHotel($id)
    {
        $delHotel = Hotel::where('id', $id)->first();
        $delHotel->delete();
        return redirect()->back();
    }
    public function getLocationDistrict(Request $req)
    {
        $city_code = $req->city_id;
        $district = District::where('matp', $city_code)->get();
        echo json_encode($district);
    }
    public function getLocationWard(Request $req)
    {
        $district_code = $req->district_id;
        $ward = Ward::where('maqh', $district_code)->get();
        echo json_encode($ward);
    }
    public function getFilterHotel(Request $req)
    {
        $hotel_code = $req->hotel_id;
        $get_hotel = Hotel::where('hotel_ward_id', $hotel_code)->get();
        echo json_encode($get_hotel);
    }
    public function getFilterTypeRoom(Request $req)
    {
        $type_room_code = $req->type_room_id;
        $get_type_room = HotelRoom::where('hotel_id', $type_room_code)
            ->join('type_room', 'hotel_room.type_room_id', '=', 'type_room.id_type')
            ->get();
        echo json_encode($get_type_room);
    }
    public function getHotelRoom(Request $req)
    {
        $hotel_room = $req->hotel_room_id;
        $get_hotel_room = TypeRoom::all();
        echo json_encode($get_hotel_room);
    }
    public function postCreateRoom(Request $req)
    {
        $room = new HotelRoom();
        $room->hotel_id = $req->hotel_room_name;
        $room->type_room_id = $req->hotel_room_type;
        $room->room_price = $req->hotel_room_price;
        $room->room_numbers = $req->hotel_room_numbers;
        $room->room_status = $req->hotel_room_status;
        $room->save();
        $room_id = $room->id;
        echo json_encode(HotelRoom::find($room_id));
    }
    public function postEditRoom(Request $req)
    {
        $room = HotelRoom::findOrFail($req->id);
        $room->hotel_id = $req->hotel_room_name;
        $room->type_room_id = $req->hotel_room_type;
        $room->room_price = $req->hotel_room_price;
        $room->room_numbers = $req->hotel_room_numbers;
        $room->room_status = $req->hotel_room_status;
        $room->save();
        echo json_encode(HotelRoom::find($req->id));
    }
    public function postCreateBookHotel(Request $req)
    {
        $hotel = HotelRoom::find($req->book_hotel_type);
        $new_count = $hotel->room_booked+1;
        if ($new_count > $hotel->room_numbers) {
            echo json_encode(array('error' => 'Phòng đã đầy'));
            die;
        }

        $book_hotel = new BookHotel();
        $book_hotel->id_hotel = $req->book_hotel_name;
        $book_hotel->city_id = $req->book_hotel_city;
        $book_hotel->district_id = $req->book_hotel_district;
        $book_hotel->ward_id = $req->book_hotel_ward;
        $book_hotel->hotel_address_id = $req->book_hotel_address;
        $book_hotel->hotel_type_room = $req->book_hotel_type;
        $book_hotel->hotel_check_in = $req->book_check_in;
        $book_hotel->hotel_check_out = $req->book_check_out;
        $book_hotel->hotel_number_day = $req->book_hotel_night;
        $book_hotel->hotel_price = $req->book_hotel_price;
        $book_hotel->hotel_total_price = $req->book_hotel_totalPrice;
        $book_hotel->hotel_customer = $req->book_hotel_cus;
        $book_hotel->hotel_identity_card = $req->book_hotel_card;
        $book_hotel->hotel_cus_phone = $req->book_hotel_phone;

        $book_hotel->save();
        $bookhotel_id = $book_hotel->id;
        $hotel->room_booked = $hotel->room_booked+1;
        $hotel->save();
        echo json_encode(BookHotel::find($bookhotel_id));
    }
    public function postEditBookHotel(Request $req)
    {
        $hotel = HotelRoom::findOrFail($req->book_hotel_name);
        $new_count = $hotel->room_booked+1;
        if ($new_count > $hotel->room_numbers) {
            echo json_encode(array('error' => 'Phòng đã đầy'));
            die;
        }
        $book_hotel = BookHotel::findOrFail($req->id);
        $book_hotel->id_hotel = $req->book_hotel_name;
        $book_hotel->city_id = $req->book_hotel_city;
        $book_hotel->district_id = $req->book_hotel_district;
        $book_hotel->ward_id = $req->book_hotel_ward;
        $book_hotel->hotel_address_id = $req->book_hotel_address;
        $book_hotel->hotel_type_room = $req->book_hotel_type;
        $book_hotel->hotel_check_in = $req->book_check_in;
        $book_hotel->hotel_check_out = $req->book_check_out;
        $book_hotel->hotel_number_day = $req->book_hotel_night;
        $book_hotel->hotel_price = $req->book_hotel_price;
        $book_hotel->hotel_total_price = $req->book_hotel_totalPrice;
        $book_hotel->hotel_customer = $req->book_hotel_cus;
        $book_hotel->hotel_identity_card = $req->book_hotel_card;
        $book_hotel->hotel_cus_phone = $req->book_hotel_phone;
        $book_hotel->save();
        $hotel->room_booked = $hotel->room_booked+1;
        $hotel->save();
        echo json_encode(BookHotel::find($req->id));
    }
    public function getDetailHotel(Request $req)
    {
        $get_hotel = Hotel::findOrFail($req->hotel_id);
        $get_hotel['city_list'] = City::all();
        $get_hotel['district_list'] = District::where('matp', $get_hotel->hotel_city_id)->get();
        $get_hotel['ward_list'] = Ward::where('maqh', $get_hotel->hotel_district_id)->get();
        echo json_encode($get_hotel);
    }
    public function getDetailBookHotel(Request $req)
    {
        $getHotel = BookHotel::findOrFail($req->bookhotel_id);
        $getHotel['getHotelRoom'] = HotelRoom::where('id', $getHotel->hotel_type_room)
            ->join('type_room', 'hotel_room.type_room_id', '=', 'type_room.id_type')
            ->join('status', 'hotel_room.room_status', '=', 'status.id_status')
            ->select('hotel_room.*', 'type_room.*', 'status.*')
            ->get();
        $getHotel['hotelList'] = Hotel::where('id', $getHotel->id_hotel)->get();
        $getHotel['cityList'] = City::all();
        $getHotel['districtList'] = District::where('matp', $getHotel->city_id)->get();
        $getHotel['wardList'] = Ward::where('maqh', $getHotel->district_id)->get();
        echo json_encode($getHotel);
    }
    public function getRoom(Request $req)
    {
        $getRoom = HotelRoom::findOrFail($req->room_id);
        $getRoom['get_hotel_list'] = HotelRoom::where('hotel_id', $getRoom->hotel_id)
            ->join('hotels', 'hotel_room.hotel_id', '=', 'hotels.id')
            ->join('type_room', 'hotel_room.type_room_id', '=', 'type_room.id_type')
            ->join('status', 'hotel_room.room_status', '=', 'status.id_status')
            ->select('hotel_room.*', 'hotels.id AS hotels_id', 'hotels.hotel_name', 'type_room.*', 'status.*')
            ->get();
        echo json_encode($getRoom);
    }
}
