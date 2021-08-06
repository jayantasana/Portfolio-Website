<?php

namespace App\Http\Controllers;

use App\HappyClient;
use Illuminate\Http\Request;

class HappyClientController extends Controller
{
    function HappyClientAdd(){
        return view('backend.happyclient.happyclient_add');
    }

    function HappyClientStore(Request $request){
        $happy = new HappyClient;
        $happy->counter = $request->counter;
        $happy->title = $request->title;
        $happy->save();

        return back()->with('HappyClientStore', "Happy Client Added Successfully");
    }

    function HappyClientList(){
        $happyclient = HappyClient::paginate();
        $happytrush = HappyClient::onlyTrashed()->get();
        return view('backend.happyclient.happyclient_list',[
            'happyclient' => $happyclient,
            'happytrush' => $happytrush,
        ]);
    }

    function HappyClientEdit($id){
        $hclient = HappyClient::where('id', $id)->first();
        return view('backend.happyclient.happyclient_edit',[
            'hclient' => $hclient,
        ]);
    }

    function HappyClientUpdate(Request $request){
        $happy = HappyClient::findOrFail($request->happy_id);
        $happy->counter = $request->counter;
        $happy->title = $request->title;
        $happy->save();

        return back()->with('HappyClientUpdate', "Happy Client Update Successfully");
    }

    function HappyClientDelete($id){
        HappyClient::findOrFail($id)->delete();
        return back()->with('HappyClientDelete', "Happy Client Delete Successfully");
    }

    function HappyClientRestore($id){
        HappyClient::withTrashed()->findOrFail($id)->restore();
        return back()->with('HappyClientRestore', "Happy Client Restore Successfully");

    }

    function HappyClientParmanentDelete($id){
        HappyClient::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('HappyClientParmanentDelete', "Happy Client Parmanent Delete Successfully");
    }
}
