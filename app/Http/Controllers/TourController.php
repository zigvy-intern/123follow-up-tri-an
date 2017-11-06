<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class TourController extends Controller
{
    public function getTour()
    {
        $tour = Tour::all();
        return view('tour.tour-layout', compact('tour'));
    }
}
