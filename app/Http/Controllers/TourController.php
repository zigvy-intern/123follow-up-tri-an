<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\TourDetail;
use App\City;
use App\BookTour;
use App\Customer;
use DB;

class TourController extends Controller
{
    // public function getAddTour()
    // {
    //     $tour = Tour::paginate(6);
    //     $city = City::all();
    //     $bookingTour = BookTour::all();
    //     $customer = Customer::all();
    //     $join_table = DB::table('book_tour')
    //        ->join('tours', 'book_tour.book_tour_id', '=', 'tours.id')
    //        ->select('book_tour.*', 'tours.tour_name')
    //        ->get();
    //     return view('tour.tour-layout', compact('tour', 'city', 'bookTour', 'customer', 'join_table'));
    // }
    public function getTourDetail(Request $req)
    {
        $getCity = City::all();
        $getTour = Tour::where('id', $req->id)->first();
        $join_table_city = DB::table('tours')
           ->join('devvn_tinhthanhpho', 'tours.id', '=', 'devvn_tinhthanhpho.matp')
           ->select('tours.*', 'devvn_tinhthanhpho.name')
           ->get();
        $tourDetail = TourDetail::where('tour_id', $req->id)->first();
        $tourData = $tourDetail->getTourViewData();
        $tourData['tour_image_detail'] = explode(',', $tourData['tour_image_detail']);

        return view('tour.tourdetail.tour-detail', compact('tourDetail', 'getTour', 'getCity', 'join_table_city'), $tourData);
    }
    // public function postAddTour(Request $req)
    // {
    //     if ($req->hasFile('add_tour_image')) {
    //         $image = $req->file('add_tour_image');
    //         if ($image->getClientSize()<2*1024*1024) {
    //             $base_name = $image->getClientOriginalName(); //a.png
    //
    //             $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654
    //
    //             $ext = $image->getClientOriginalExtension();
    //             $final_name = $name.'.'.$ext;
    //             $image->move('/source/img/tour', $final_name);
    //             //luw thông tin xuống db
    //             $addTour = new Tour;
    //             //sửa $product = Product::where()->first()
    //             $addTour->tour_name = $req->add_tour_name;
    //             $addTour->tour_from = $req->add_tour_from;
    //             $addTour->tour_to = $req->add_tour_to;
    //             $addTour->tour_time = $req->add_start_time;
    //             $addTour->tour_time = $req->add_end_time;
    //             $addTour->tour_member = $req->add_tour_member;
    //             $addTour->tour_price = $req->add_tour_price;
    //             $addTour->tour_image = $final_name;
    //             $addTour->save();
    //
    //             return redirect()->route('tourLayout')->with(['flash_message' => ' <strong> Success!</strong> Complete Add Tour']);
    //         } else {
    //             return redirect()->back()->with('err_file', 'File too big');
    //         }
    //     } else {
    //         return redirect()->back()->withInput()->with('err_file', 'Please choose a photo');
    //     }
    // }
    // public function getEditTour($id)
    // {
    //     $city = City::all();
    //     $tour = Tour::where('id', $id)->first();
    //     return view('tour.tour-layout', compact('city', 'tour'));
    // }
    // public function postEditTour($id, Request $req)
    // {
    //     $editTour = Tour::where('id', $id)->first();
    //     if ($req->hasFile('add_tour_image')) {
    //         $image = $req->file('add_tour_image');
    //         if ($image->getClientSize()<2*1024*1024) {
    //             $base_name = $image->getClientOriginalName(); //a.png
    //
    //             $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654
    //
    //             $ext = $image->getClientOriginalExtension();
    //             $final_name = $name.'.'.$ext;
    //             $image->move('/source/img/tour', $final_name);
    //             $editTour->image = $final_name;
    //             $editTour->save();
    //         } else {
    //             return redirect()->back()->with('err_file', 'File too big');
    //         }
    //     }
    //     $addTour->tour_name = $req->add_tour_name;
    //     $addTour->tour_from = $req->add_tour_from;
    //     $addTour->tour_to = $req->add_tour_to;
    //     $addTour->tour_time = $req->add_start_time;
    //     $addTour->tour_time = $req->add_end_time;
    //     $addTour->tour_member = $req->add_tour_member;
    //     $addTour->tour_price = $req->add_tour_price;
    //     $editTour->save();
    //     return redirect()->route('tourLayout.show');
    // }
    public function getTour()
    {
        $tour = Tour::paginate(6);
        $city = City::all();
        $bookTour = BookTour::all();
        $customer = Customer::all();
        $join_table = DB::table('book_tour')
           ->join('tours', 'book_tour.book_tour_id', '=', 'tours.id')
           ->select('book_tour.*', 'tours.tour_name')
           ->get();
        $join_city = DB::table('tours')
           ->join('devvn_tinhthanhpho', 'tours.id', '=', 'devvn_tinhthanhpho.matp')
           ->select('tours.*', 'devvn_tinhthanhpho.name')
           ->get();
        return view('tour.tour-layout', compact('tour', 'city', 'bookTour', 'customer', 'join_table', 'join_city'));
    }
    public function postCreateAddTour(Request $req)
    {
        $tour = new Tour();
        $tour->tour_name = $req->add_tour_name;
        $tour->tour_from_id = $req->add_tour_from;
        $tour->tour_to_id = $req->add_tour_to;
        $tour->tour_start_time = $req->add_start_time;
        $tour->tour_end_time = $req->add_end_time;
        $tour->tour_member = $req->add_tour_member;
        $tour->tour_price = $req->add_tour_price;
        $tour->tour_image = $req->add_tour_image;

        $tour->save();
        $tour_id = $tour->id;
        echo json_encode(Tour::find($tour_id));
    }
    public function postEditAddTour(Request $req)
    {
        $tour = Tour::findOrFail($req->id);
        $input = $req->all();
        $tour->fill($input)->save();
        echo json_encode(Tour::find($req->id));
    }
    public function getDeleteTour($id)
    {
        $delTour = Tour::where('id', $id)->first();
        $delTour->delete();
        return redirect()->back();
    }
    public function postCreateBookTour(Request $req)
    {
        $bookTour = new BookTour();
        $bookTour->book_tour_id = $req->book_choose_tour;
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
        echo json_encode(BookTour::find($bookTour_id));
    }
    public function postEditBookTour(Request $req)
    {
        $bookTour = BookTour::findOrFail($req->id);
        $input = $req->all();
        $bookTour->fill($input)->save();
        echo json_encode(BookTour::find($req->id));
    }
}
