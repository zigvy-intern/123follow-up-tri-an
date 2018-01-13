<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;

class TitleController extends Controller
{
    public function postCreateTitle(Request $req)
    {
        $title = new Title();
        $title->title_name = $req->title_name;
        $title->status = $req->title_status;
        $title->save();
        $title_id = $title->id;

        echo json_encode(Title::find($title_id));
    }
    public function postEditTitle(Request $req)
    {
        $title = Title::findOrFail($req->id);
        $title->title_name = $req->title_name;
        $title->status = $req->title_status;
        $title->save();
        
        echo json_encode(Title::find($req->id));
    }
}
