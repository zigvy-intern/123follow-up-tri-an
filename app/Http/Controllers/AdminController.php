<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Group;
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
    public function getGroup()
    {
        $group = Group::all();
        $group_data = [];
        foreach ($group as $key => $value) {
            $group_view = $value->getViewData();
            $group_view['users'] = [];
            $arrayMember = explode(',', $value->members);
            foreach ($arrayMember as $index => $row) {
                $member = User::find($row);
                array_push($group_view['users'], ['user_id' => $member->id, 'name' => $member->name]);
            }
            array_push($group_data, $group_view);
        }
        return view('admin.groups.group-list', compact('group'));
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
        $group = Group::all();
        $user = User::all();
        $joinTable = DB::table('users')
           ->join('roles', 'users.role_id', '=', 'roles.id')
           ->select('users.*', 'roles.role_name')
           ->get();

        return view('admin.accountSettings', compact('title', 'group', 'user', 'role', 'joinTable'));
    }
    public function getProfileUser()
    {
        $title_profile = Title::all();
        $role_profile = Role::all();
        $profile = User::all();
        return view('admin.profile', compact('profile', 'role_profile', 'title_profile'));
    }
    public function getCustomer()
    {
        $customer = Customer::all();
        return view('customer.customer-list', compact('customer'));
    }
}
