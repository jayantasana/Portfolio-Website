<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ClientController extends Controller
{
    function ClientAdd(){
        return view('backend.client.client_add');
    }

    function ClientStore(Request $request){

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $ext = Str::random(10) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('clientimage/' . $ext));

            $client = new Client;
            $client->title = $request->title;
            $client->position = $request->position;
            $client->comment = $request->comment;
            $client->image = $ext;
            $client->save();
        }
        return back()->with('ClientStore', "Client Added Successfully");
    }

    function ClientList(){
        $clientlist = Client::paginate();
        $trushclient = Client::onlyTrashed()->get();
        return view('backend.client.client_list',[
            'clientlist' => $clientlist,
            'trushclient' => $trushclient,
        ]);
    }

    function ClientEdit($id){
        $experedit = Client::where('id', $id)->first();
        return view("backend.client.client_edit",[
            'experedit' => $experedit,
        ]);
    }

    function ClientUpdate(Request $req){
        if ($req->hasFile('image')) {
            $image = $req->file('image');

            $ext = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $clientupdate = Client::findOrFail($req->client_id);
            $old_img_location = public_path('clientimage/' . $clientupdate->image);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }
            Image::make($image)->save(public_path('clientimage/' . $ext));
            $clientupdate->image = $ext;
        }
        $clientupdate->title = $req->title;
        $clientupdate->position = $req->position;
        $clientupdate->comment = $req->comment;
        $clientupdate->save();

        return back()->with('ClientUpdate', "Client Update Successfully");
    }

    function ClientDelete($id){
        Client::findOrFail($id)->delete();
        return back()->with('ClientDelete', "Client Delete Successfully");
    }

    function ClientRestore($id){
        Client::withTrashed()->findOrFail($id)->restore();
        return back()->with('ClientRestore', "Client Restore Successfully");

    }

    function ClientParmanentDelete($id){
        Client::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('ClientParmanentDelete', "Client Parmanent Delete Successfully");
    }
}
