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
        return view('admin.title', compact('title'));
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

    // public function postCreateUser(Request $req)
    // {
    //     $user = new User();
    //     $user->name = $req->name;
    //     $user->email = $req->email;
    //     $user->password = $req->password;
    //     $user->re_password = $req->re_password;
    //     $user->save();
    //     $user_id = $user->id;
    //
    //     echo json_encode(User::find($user_id));
    // }

    public function getSearch(Request $req)
    {
        $search = User::where('name', 'like', '%'.$req->key.'%')
                          ->orWhere('email', $req->key)
                          ->get();
        return view('page.search', compact('search'));
    }
}
