<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Title;
use App\Role;
use App\Customer;
use Hash;
use DB;

class AdminController extends Controller
{
    public function getAdmin()
    {
        return view('admin.index');
    }
    public function getTitle()
    {
        $title = Title::all();
        return view('admin.titles.title-list', compact('title'));
    }
    public function getUser()
    {
        $role = Role::all();
        $user = User::all();
        $title = Title::all();

        return view('admin.users.user-list', compact('user', 'role', 'title'));
    }
    public function getRole()
    {
        $role = Role::all();
        return view('admin.roles.role-list', compact('role'));
    }
    public function getAccountSetting()
    {
        $role = Role::all();
        $title = Title::all();
        $user = User::all();
        return view('admin.accountSettings', compact('title', 'group', 'user', 'role'));
    }
    public function getCustomer()
    {
        $customer = Customer::all();
        return view('customer.customer-list', compact('customer'));
    }
}
