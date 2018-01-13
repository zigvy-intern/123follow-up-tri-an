<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function postCreateRole(Request $req)
    {
        $role = new Role();
        $role->role_name = $req->add_role_name;
        $role->save();
        $role_id = $role->id;

        echo json_encode(Role::find($role_id));
    }
    public function postEditRole(Request $req)
    {
        $role = Role::findOrFail($req->id);
        $role->role_name = $req->add_role_name;
        $role->save();

        echo json_encode(Role::find($req->id));
    }
}
