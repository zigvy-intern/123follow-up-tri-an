<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\User;
use App\Role;
use App\Hotel;
use App\HotelRoom;
use App\Customer;
use App\BookTour;
use App\BookHotel;
use App\Tour;

class DeleteController extends Controller
{
    public function getDeleteTitle($id)
    {
        $title = Title::where('id', $id)->first();
        if ($title) {
            $title->delete();
            return redirect()->route('accountSetting');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
    public function getDeleteUser($id)
    {
        $user = User::where('id', $id)->first();
        if (!($user['role_id'] == 'Admin')) {
            $user->delete();
            return redirect()->route('accountSetting');
        } else {
            return redirect()->back()->with('error', 'No permission to delete this user!');
        }
    }
    public function getDeleteCustomer($id)
    {
        $customer = Customer::where('id', $id)->first();
        if ($customer) {
            $customer->delete();
            return redirect()->route('customer');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
    public function getDeleteRole($id)
    {
        $role = Role::where('id', $id)->first();
        if ($role) {
            $role->delete();
            return redirect()->route('accountSetting');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
    public function getDeleteBookTour(Request $req)
    {
        $bookTour = BookTour::findOrFail($req->id);
        $getTour = Tour::findOrFail($bookTour->book_tour_id);
        $getTour->booked_tour = $getTour->booked_tour-$bookTour->book_member;
        $getTour->save();
        echo json_encode($bookTour);
        if ($bookTour) {
            $bookTour->delete();
            return redirect()->route('tourLayout');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
    public function getDeleteBookHotel(Request $req)
    {
        $bookHotel= BookHotel::findOrFail($req->id);
        $getHotelRoom = HotelRoom::findOrFail($bookHotel->hotel_type_room);
        $getHotelRoom->room_booked = $getHotelRoom->room_booked-1;
        $getHotelRoom->save();
        if ($bookHotel) {
            $bookHotel->delete();
            return redirect()->route('hotelLayout');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
}
