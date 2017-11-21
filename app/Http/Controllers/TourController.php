<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\TourDetail;
use App\Country;
use App\BookingTour;

class TourController extends Controller
{
    public function getAddTour()
    {
        $tour = Tour::paginate(6);
        $country = Country::all();
        return view('tour.tour-layout', compact('tour', 'country'));
    }
    public function getTourDetail(Request $req)
    {
        $getCountry = Country::all();
        $getTour = Tour::where('id', $req->id)->first();
        $tourDetail = TourDetail::where('tour_id', $req->id)->first();
        $tourData = $tourDetail->getTourViewData();
        $tourData['tour_image_detail'] = explode(',', $tourData['tour_image_detail']);

        return view('tour.tour-detail', compact('tourDetail', 'getTour', 'getCountry'), $tourData);
    }
    public function postAddTour(Request $req)
    {
        if ($req->hasFile('add_tour_image')) {
            $image = $req->file('add_tour_image');
            if ($image->getClientSize()<2*1024*1024) {
                $base_name = $image->getClientOriginalName(); //a.png

                $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654

                $ext = $image->getClientOriginalExtension();
                $final_name = $name.'.'.$ext;
                $image->move('/source/img/tour', $final_name);
                //luw thông tin xuống db
                $addTour = new Tour;
                //sửa $product = Product::where()->first()
                $addTour->tour_name = $req->add_tour_name;
                $addTour->tour_from = $req->add_tour_from;
                $addTour->tour_to = $req->add_tour_to;
                $addTour->tour_time = $req->add_tour_time;
                $addTour->tour_member = $req->add_tour_member;
                $addTour->tour_price = $req->add_tour_price;
                $addTour->tour_image = $final_name;
                $addTour->save();

                return redirect()->route('tourLayout');
            } else {
                return redirect()->back()->with('err_file', 'File too big');
            }
        } else {
            return redirect()->back()->withInput()->with('err_file', 'Please choose a photo');
        }
    }
    public function getEditTour($id)
    {
        $country = Country::all();
        $tour = Tour::where('id', $id)->first();
        return view('tour.tour-layout', compact('country', 'tour'));
    }
    public function postEditTour($id, Request $req)
    {
        $editTour = Tour::where('id', $id)->first();
        if ($req->hasFile('add_tour_image')) {
            $image = $req->file('add_tour_image');
            if ($image->getClientSize()<2*1024*1024) {
                $base_name = $image->getClientOriginalName(); //a.png

                $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654

                $ext = $image->getClientOriginalExtension();
                $final_name = $name.'.'.$ext;
                $image->move('/source/img/tour', $final_name);
                $editTour->image = $final_name;
                $editTour->save();
            } else {
                return redirect()->back()->with('err_file', 'File too big');
            }
        }
        $addTour->tour_name = $req->add_tour_name;
        $addTour->tour_from = $req->add_tour_from;
        $addTour->tour_to = $req->add_tour_to;
        $addTour->tour_time = $req->add_tour_time;
        $addTour->tour_member = $req->add_tour_member;
        $addTour->tour_price = $req->add_tour_price;
        $editTour->save();
        return redirect()->route('tourLayout');
    }
    public function getDeleteTour($id)
    {
        $delTour = Tour::where('id', $id)->first();
        $delTour->delete();
        return redirect()->back();
    }
    public function getBookingTour()
    {
        $bookingTour = BookingTour::all();
        $tour = Tour::all();
        return view('tour.booking.booking-tour', compact('bookingTour', 'tour'));
    }
}
