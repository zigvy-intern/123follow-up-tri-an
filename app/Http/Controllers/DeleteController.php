<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\Group;
use App\User;

class DeleteController extends Controller
{
    public function getDeleteTitle($id){
    	$title = Title::where('id',$id)->first();
    	if($title){
    		$title->delete();
    		return redirect()->route('title');
    	}else{
    		return redirect()->back()->with('error','Failed');
    	}
    }
    public function getDeleteUser($id)
    {
        $user = User::where('id', $id)->first();
        if (!($user['role']&& $user['role'] == 1)) {
            $user->delete();
            return redirect()->route('user');
        } else {
            return redirect()->back()->with('error', 'No permission to delete this user!');
        }
    }

    public function getDeleteGroup($id)
    {
        $group = Group::where('id', $id)->first();
        if ($group) {
            $group->delete();
            return redirect()->route('group');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }

}
