<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    public function postCreateUser(Request $req)
    {
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $base_name = $image->getClientOriginalName(); //a.png
            $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654
            $ext = $image->getClientOriginalExtension();
            $final_name = $name.'.'.$ext;
            $pathImage = $image->move(public_path('source\img\profile'), $final_name);

            $user = new User();
            $user->name = $req->name;
            $user->birthday = $req->birthday;
            $user->email = $req->email;
            $user->phone = $req->phone;
            $user->address = $req->address;
            $user->password = Hash::make($req->password);
            $user->role_id = $req->role;
            $user->title = $req->title;
            $user->image = $final_name;
            $user->save();
            $user_id = $user->id;

            echo json_encode(User::find($user_id));
        }
    }
    public function postEditUser(Request $req)
    {
        $user = User::findOrFail($req->id);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $base_name = $image->getClientOriginalName(); //a.png
            $name = pathinfo($base_name, PATHINFO_FILENAME); //a12345677654
            $ext = $image->getClientOriginalExtension();
            $final_name = $name.'.'.$ext;
            $pathImage = $image->move(public_path('source\img\profile'), $final_name);

            $user->name = $req->name;
            $user->birthday = $req->birthday;
            $user->email = $req->email;
            $user->phone = $req->phone;
            $user->address = $req->address;
            $user->password = Hash::make($req->password);
            $user->role_id = $req->role;
            $user->title = $req->title;
            $user->image = $final_name;

            $user->save();
            echo json_encode(User::find($req->id));
        }
    }
}
