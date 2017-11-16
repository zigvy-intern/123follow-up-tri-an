<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\TourDetail;

class TourController extends Controller
{
    public function getTour()
    {
        $tour = Tour::paginate(3);
        return view('tour.tour-layout', compact('tour'));
    }
    public function getTourDetail(Request $req)
    {
        $getTour = Tour::where('id', $req->id)->first();
        $tourDetail = TourDetail::where('tour_id', $req->id)->first();
        $tourData = $tourDetail->getTourViewData();
        $tourData['tour_image_detail'] = explode(',', $tourData['tour_image_detail']);

        return view('tour.tour-detail', compact('tourDetail', 'getTour'), $tourData);
    }
}
