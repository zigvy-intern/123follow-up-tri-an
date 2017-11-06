<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function store(Request $req)
    {
        $group = new Group();
        $group->group_name = $req->groupname;
        $group->leader_name = $req->leader;
        $group->members = $req->members;
        $group->job_name = $req->job;
        $group->save();
        $group_id = $group->id;

        echo json_encode(Group::find($group_id));
    }
}
