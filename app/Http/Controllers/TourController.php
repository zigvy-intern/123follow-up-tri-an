<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\TourDetail;
use App\City;
use App\BookTour;
use App\Customer;
use App\User;
use DB;
use Input;

class TourController extends Controller
{
    public function getTour()
    {
        $user = User::all();
        $tour = Tour::all();
        $city = City::all();
        $bookTour = BookTour::all();
        $customer = Customer::all();
        $join_table = DB::table('book_tour')
           ->join('tours', 'book_tour.book_tour_id', '=', 'tours.id')
           ->join('users', 'book_tour.book_user_id', '=', 'users.id')
           ->select('book_tour.*', 'tours.tour_name', 'users.name', 'tours.id AS tours_id', 'tours.tour_limit_booking', 'tours.booked_tour')
           ->get();
        $join_city = DB::table('tours')
           ->join('place_city', 'tours.id', '=', 'place_city.matp')
           ->select('tours.*', 'place_city.city_name', 'place_city.matp')
           ->paginate(6);
        return view('tour.tour-layout', compact('tour', 'user', 'city', 'bookTour', 'customer', 'join_table', 'join_city'));
    }
    public function postCreateAddTour(Request $req)
    {
        if ($req->hasFile('add_tour_image')) {
            $image = $req->file('add_tour_image');
            $base_name = $image->getClientOriginalName(); //a.png
            $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654
            $ext = $image->getClientOriginalExtension();
            $final_name = $name.'.'.$ext;
            $pathImage = $image->move(public_path('source\img\tour'), $final_name);

            $tour = new Tour();
            $tour->tour_name = $req->add_tour_name;
            $tour->tour_from_id = $req->add_tour_from;
            $tour->tour_to_id = $req->add_tour_to;
            $tour->tour_start_time = $req->add_start_time;
            $tour->tour_end_time = $req->add_end_time;
            $tour->tour_limit_booking = $req->add_tour_member;
            $tour->tour_price = $req->add_tour_price;
            $tour->tour_image = $final_name;

            $tour->save();
            $tour_id = $tour->id;

            $tour_detail = new TourDetail();
            $tour_detail->tour_id = $tour_id;
            $tour_detail_id = $tour_detail->id;
            $tour_detail->save();
            echo json_encode(Tour::find($tour_id), TourDetail::find($tour_detail_id));
        }
    }
    public function postEditAddTour(Request $req)
    {
        $tour = Tour::findOrFail($req->id);
        if ($req->hasFile('add_tour_image')) {
            $image = $req->file('add_tour_image');
            $base_name = $image->getClientOriginalName(); //a.png
            $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654
            $ext = $image->getClientOriginalExtension();
            $final_name = $name.'.'.$ext;
            $pathImage = $image->move(public_path('source\img\tour'), $final_name);

            $tour->tour_name = $req->add_tour_name;
            $tour->tour_from_id = $req->add_tour_from;
            $tour->tour_to_id = $req->add_tour_to;
            $tour->tour_start_time = $req->add_start_time;
            $tour->tour_end_time = $req->add_end_time;
            $tour->tour_limit_booking = $req->add_tour_member;
            $tour->tour_price = $req->add_tour_price;
            $tour->tour_image = $final_name;

            $tour->save();
            echo json_encode(Tour::find($req->id));
        }
    }
    public function getDeleteTour($id)
    {
        $delTour = Tour::where('id', $id)->first();
        $delTour->delete();
        return redirect()->back();
    }
    public function postCreateBookTour(Request $req)
    {
        $tour = Tour::findOrFail($req->book_choose_tour);
        $new_count = $tour->booked_tour + $req->book_tour_member;
        if ($new_count > $tour->tour_limit_booking) {
            echo json_encode(array('error' => 'Exceeds the number of people allowed '.($new_count - $tour->tour_limit_booking).' people'));
            die;
        }
        $bookTour = new BookTour();
        $bookTour->book_tour_id = $req->book_choose_tour;
        $bookTour->book_user_id = $req->book_user_id;
        $bookTour->book_cus_name = $req->book_cus_name;
        $bookTour->book_email = $req->book_tour_email;
        $bookTour->book_phone = $req->book_tour_phone;
        $bookTour->book_member = $req->book_tour_member;
        $bookTour->book_address = $req->book_tour_address;
        $bookTour->book_time = $req->book_tour_time;
        $bookTour->book_price = $req->book_tour_price;
        $bookTour->book_total_price = $req->book_tour_totalPrice;
        $bookTour->save();
        $bookTour_id = $bookTour->id;
        $tour->booked_tour = $tour->booked_tour+$req->book_tour_member;
        $tour->save();
        echo json_encode(BookTour::find($bookTour_id));
    }
    public function postEditBookTour(Request $req)
    {
        $tour = Tour::findOrFail($req->book_choose_tour);
        $new_count = $tour->booked_tour + $req->book_tour_member;
        if ($new_count > $tour->tour_limit_booking) {
            echo json_encode(array('error' => 'Exceeds the number of people allowed '.($new_count - $tour->tour_limit_booking).' people'));
            die;
        }
        $bookTour = BookTour::findOrFail($req->id);
        $bookTour->book_tour_id = $req->book_choose_tour;
        $bookTour->book_user_id = $req->book_user_id;
        $bookTour->book_cus_name = $req->book_cus_name;
        $bookTour->book_email = $req->book_tour_email;
        $bookTour->book_phone = $req->book_tour_phone;
        $bookTour->book_member = $req->book_tour_member;
        $bookTour->book_address = $req->book_tour_address;
        $bookTour->book_time = $req->book_tour_time;
        $bookTour->book_price = $req->book_tour_price;
        $bookTour->book_total_price = $req->book_tour_totalPrice;
        $bookTour->save();
        $bookTour_id = $bookTour->id;
        
        $tour->booked_tour = $tour->booked_tour+$req->book_tour_member;
        $tour->save();
        echo json_encode(BookTour::find($req->id));
    }
    public function getTourDetail(Request $req)
    {
        $getCity = City::all();
        $getTour = Tour::where('id', $req->id)->first();
        $join_table_city = DB::table('tours')->where('id', $req->id)
           ->join('place_city', 'tours.id', '=', 'place_city.matp')
           ->select('tours.*', 'place_city.*')
           ->first();
        $tourDetail = TourDetail::where('tour_id', $req->id)->first();
        $tourData = $tourDetail->getTourViewData();
        $tourData['tour_image_detail'] = explode(',', $tourData['tour_image_detail']);

        return view('tour.tourdetail.tour-detail', compact('tourDetail', 'getTour', 'getCity', 'join_table_city'), $tourData);
    }
    public function postEditTourInfo(Request $req)
    {
        $tourDetail = TourDetail::findOrFail($req->id);
        $file = [];
        if ($req->file('tour_info_image')) {
            foreach ($req->file('tour_info_image') as $media) {
                if (!empty($media)) {
                    $destinationPath = 'source\img\tour';
                    $filename = $media->getClientOriginalName();
                    $media->move($destinationPath, $filename);
                    $file[] = $filename;
                }
            }
        }
        $tourDetail->tour_image_detail = implode(',', $file);
        $tourDetail->tour_id = $req->tour_info_name;
        $tourDetail->tour_description_detail = $req->tour_info_journey_content;
        $tourDetail->save();
        echo json_encode(TourDetail::find($req->id));
    }
}
