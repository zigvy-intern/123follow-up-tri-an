<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Hash;
use App\User;

class RegisterController extends Controller
{
	public function getRegister(){
        return view('admin.register');
    }

    public function postRegister(RegisterRequest $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('login');
    }
}
