<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Group;
use App\Title;
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
        $user = User::all();
        return view('admin.users.user-list', compact('user'));
    }
    public function getAccountSetting()
    {
        $title = Title::all();
        $group = Group::all();
        $user = User::all();
        return view('admin.accountSettings', compact('title', 'group', 'user'));
    }
    public function getProfileUser()
    {
        $profile = User::all();
        return view('admin.profile', compact('profile'));
    }
}
