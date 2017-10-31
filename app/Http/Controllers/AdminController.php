<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Group;
use App\Title;
use App\Role;
use Hash;

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
        return view('admin.groups.group-list', compact('group'));
    }
    public function getUser()
    {
        $role = Role::all();
        $user = User::all();
        return view('admin.users.user-list', compact('user', 'role'));
    }
    public function getAccountSetting()
    {
        $role = Role::all();
        $title = Title::all();
        $group = Group::all();
        $user = User::all();
        return view('admin.accountSettings', compact('title', 'group', 'user', 'role'));
    }
    public function getProfileUser()
    {
        $title_profile = Title::all();
        $role_profile = Role::all();
        $profile = User::all();
        return view('admin.profile', compact('profile', 'role_profile', 'title_profile'));
    }
}
