<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
    public function getTour(){
    	return view('admin.tours.tour');
    }
}
