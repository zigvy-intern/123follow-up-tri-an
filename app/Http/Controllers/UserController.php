<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function postCreateUser(Request $req)
    {
        $user = new User();
        $user->name = $req->name;
        $user->birthday = $req->birthday;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->password = $req->password;
        $user->role = $req->role;
        $user->title = $req->title;
        $user->save();
        $user_id = $user->id;

        echo json_encode(User::find($user_id));
    }
    public function postEditUser(Request $req)
    {
        $user = User::findOrFail($req->id);
        $input = $req->all();
        $user->fill($input)->save();
        echo json_encode(User::find($req->id));
    }
}
