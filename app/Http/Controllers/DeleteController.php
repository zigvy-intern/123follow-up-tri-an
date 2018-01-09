<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\User;
use App\Role;
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
        $bookTour = BookTour::where('id', $req->id)->first();
        if ($bookTour) {
            $bookTour->delete();
            return redirect()->route('tourLayout');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
    public function getDeleteBookHotel($id)
    {
        $bookHotel = BookHotel::where('id', $id)->first();
        if ($bookHotel) {
            $bookHotel->delete();
            return redirect()->route('hotelLayout');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
}
