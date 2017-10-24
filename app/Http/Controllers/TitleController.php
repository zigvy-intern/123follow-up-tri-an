<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;

class TitleController extends Controller {
    public function postCreateTitle(Request $req) {
        $title = new Title();
        $title->title_name = $req->title_name;
        $title->status = $req->status;
        $title->save();
        $title_id = $title->id;
        
        echo json_encode(Title::find($title_id));
    }
     public function postEditTitle(Request $req) {
        $title = Title::findOrFail($req->id);
        $input = $req->all();
        $title->fill($input)->save();
        echo json_encode(Title::find($req->id));
    }
}
