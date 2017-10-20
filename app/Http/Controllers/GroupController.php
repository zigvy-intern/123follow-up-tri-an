<?php

namespace App\Http\Controllers;
use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller{
    
    public function show(Group $group) {
        return $group;
    }

    public function store(Request $req) {
      $group = new Group();
      $group->group_name = $req->groupname;
      $group->leader_name = $req->leader;
      $group->members = $req->members;
      $group->job_name = $req->job;
      $group->create_day = $req->createday;
      $group->deadline = $req->deadline;
      $group->save();
      $group_id = $group->id;

      echo json_encode(Group::find($group_id));
    }

    public function update(Request $request, Group $group)
    {
        $group->update($request->all());

        return response()->json($group, 200);
    }

    public function delete(Group $group)
    {
        $group->delete();

        return response()->json(null, 204);
    }


}
