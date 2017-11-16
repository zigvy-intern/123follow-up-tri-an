<?php

namespace App\Http\Controllers;
use App\BookHotel;
use App\tinhthanhpho;
use App\quanhuyen;
use App\xaphuongthitran;
use App\DetailHotel;
use App\type_room;


use Illuminate\Http\Request;

class BookHotelController extends Controller
{
  public function getHotel(Request $req)
  {
      $tinhthanhpho = tinhthanhpho::all();
      $quanhuyen = quanhuyen::all();
      $xaphuongthitran = xaphuongthitran::all();;
      $bookhotel = BookHotel::all();
    return view('admin.bookhotel.book-hotel',compact('tinhthanhpho','quanhuyen','xaphuongthitran','bookhotel'));
  }

  public function getHotelDetail(Request $req)
  {
      $getHotel = BookHotel::where('id', $req->id)->first();
      $HotelDetail = DetailHotel::where('hotel_id', $req->id)->first();
      $hotelData = $hotelDetail->getHotelViewData();
      $hotelData['hotel_slide'] = explode(',', $hotelData['hotel_slide']);

      return view('admin.bookhotel.addHotel', compact('HotelDetail', 'getHotel'), $hotelData);
  }
  public function getTypeRoom(Request $request)
  {
      $getDetail = DetailHotel::where('id', $request->id)->first();
      $TypeRoom = typeroom::where('id_detail', $request->id)->first();
      $roomData = $TypeRoom->getTypeViewData();

      return view('admin.bookhotel.addHotel', compact('DetailHotel', 'typeroom'), $roomData);
  }
  public function getNewHotel(Request $req)
  {
      $newhotel = new bookhotel();
      $newhotel->hotel_name = $req->hotelName;
      $newhotel->hotel_name = $req->hotelName;
      $newhotel->hotel_image = $req->avatar;
      $newhotel->save();
      $newhotel_id = $newhotel->id;

      echo json_encode(bookhotel::find($group_id));
  }
}
