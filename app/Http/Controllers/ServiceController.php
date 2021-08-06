<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use App\Service;
use phpDocumentor\Reflection\DocBlock\Serializer;

class ServiceController extends Controller
{
    function ServiceAdd(){
        return view('backend.service.service_add');
    }

    function ServiceStore(Request $request){
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');

            $ext = Str::random(10) . '.' . $icon->getClientOriginalExtension();
            Image::make($icon)->save(public_path('serviceimage/' . $ext));

            $service = new Service;
            $service->servicename = $request->servicename;
            $service->description = $request->description;
            $service->icon = $ext;
            $service->save();
        }
        return back();
    }

    function ServiceList(){
        $services = Service::paginate(5);
        $trush_services = Service::onlyTrashed()->get();
        return view('backend.service.service_list',[
            'services' => $services,
            'trush_services' => $trush_services,
        ]);
    }

    function ServiceEdit($id){
        $services = Service::where('id', $id)->first();
        return view('backend.service.service_edit',[
            'services' => $services,
        ]);
    }

    function ServiceUpdate(Request $reque){
        if ($reque->hasFile('icon')) {
            $icon = $reque->file('icon');

            $ext = Str::random(10) . '.' . $icon->getClientOriginalExtension();
            $serviceupdate = Service::findOrFail($reque->service_id);
            $old_img_location = public_path('serviceimage/' . $serviceupdate->icon);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }

            Image::make($icon)->save(public_path('serviceimage/' . $ext));
            $serviceupdate->icon = $ext;

        }
        $serviceupdate->servicename = $reque->servicename;
        $serviceupdate->description = $reque->description;
        $serviceupdate->save();

        return back()->with('ServiceUpdate', "Service Update Successfully");
    }

    function ServiceDelete($id){
        Service::findOrFail($id)->delete();
        return back()->with('ServiceDelete', "Service Delete Successfully");
    }

    function ServiceRestore($id){
        Service::withTrashed()->findOrFail($id)->restore();
        return back()->with('ServiceRestore', "Service Restore Successfully");

    }

    function ServiceParmanentDelete($id){
        Service::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('ServiceParmanentDelete', "Service Parmanent Delete Successfully");
    }

}
