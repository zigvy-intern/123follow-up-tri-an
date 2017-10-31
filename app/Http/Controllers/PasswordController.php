<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PasswordController extends Controller
{
    public function postPasswordEdit(Request $req)
    {
        $user = User::findOrFail($req->id);
        $input = $req->all();
        $user->fill($input)->save();
        echo json_encode(User::find($req->id));
    }
}
