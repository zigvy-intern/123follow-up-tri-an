<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (!Auth::check()) {
            return view('admin.login');
        } else {
            return redirect('admin-account');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => '1'
        ];
        if (Auth::attempt($login)) {
            return redirect('admin-account');
        } else {
            return redirect()->back();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
