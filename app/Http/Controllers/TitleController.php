<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function postCreateTitle(Request $req)
    {
        $title = new Title();
        $title->title_name = $req->title;
        $title->status = $req->status;
        $title->save();
        $title_id = $title->id;
        
        echo json_encode(Title::find($title_id));
    }
}
