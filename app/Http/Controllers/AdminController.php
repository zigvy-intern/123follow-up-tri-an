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
        return view('admin.accountSettings', compact('title'));
    }
    public function getGroup()
    {
        $group = Group::all();
        return view('admin.group', compact('group'));
    }

    public function getUser()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
    }

    public function getProfileUser()
    {
        $profile = User::all();
        return view('admin.profile', compact('profile'));
    }
}
