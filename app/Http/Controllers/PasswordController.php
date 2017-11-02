<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class PasswordController extends Controller
{
    /*
     * Ensure the user is signed in to access this page
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form to change the user password.
     */
    public function getChangePassword()
    {
        return view('admin.users.user-password-modal');
    }

    public function postChangePassword(Request $request)
    {
        $curPassword = $request->curPassword;
        $newPassword = $request->newPassword;

        if (!Hash::check($curPassword, Auth::user()->password)) {
            return back()->with('msg', 'The specified password does not match the current password'); //when user enter wrong password as current password
        } else {
            $request->user()->fill(['password' => Hash::make($newPassword)])->save(); //updating password into user table
            return back()->with('msg', 'Password has been updated');
        }
        // echo 'here update query for password';
    }
}
