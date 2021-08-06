<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CVExportController extends Controller
{
    function AddCVContent(){
        return view('backend.addcv.add_cv');
    }

    function PostCVContent(Request $req){
        return $req->all();
    }
}
