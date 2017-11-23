<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\Group;
use App\User;
use App\Customer;

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
        if (!($user['role']&& $user['role'] == 'Admin')) {
            $user->delete();
            return redirect()->route('accountSetting');
        } else {
            return redirect()->back()->with('error', 'No permission to delete this user!');
        }
    }
    public function getDeleteGroup($id)
    {
        $group = Group::where('id', $id)->first();
        if ($group) {
            $group->delete();
            return redirect()->route('group');
        } else {
            return redirect()->back()->with('error', 'Failed');
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
    public function getDeleteBookTour($id)
    {
        $bookTour = BookingTour::where('id', $id)->first();
        if ($bookTour) {
            $bookTour->delete();
            return redirect()->route('tourLayout');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
}
