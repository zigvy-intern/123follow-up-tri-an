<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HotelRoom;
use App\Hotel;
use App\BookHotel;

class StatisticController extends Controller
{
    public function getStatistic()
    {
        $hotel = Hotel::all();
        $stas_users = DB::table('users')->count();
        $stas_tours = DB::table('tours')->count();
        $stas_hotels = DB::table('hotels')->count();
        $stas_tour_price = DB::table('book_tour')->sum('book_total_price');
        return view('statistic.statistic-layout', compact('stas_users', 'stas_tours', 'stas_hotels', 'stas_tour_price', 'hotel'));
    }
    public function getHotelName(Request $req)
    {
        $hotel_code = $req->hotel_id;
        $hotel = DB::table('book_hotel')->where('id_hotel', $hotel_code)->get();
        echo json_encode($hotel);
    }
}
