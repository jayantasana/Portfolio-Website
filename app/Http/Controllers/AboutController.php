<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AboutController extends Controller
{
    function AboutAdd(){
        return view('backend.about.about_add');
    }

    function AboutStore(Request $request){

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $ext = Str::random(10) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('aboutimages/' . $ext));

            $about = new About;
            $about->position = $request->position;
            $about->description = $request->description;
            $about->image = $ext;
            $about->save();
        }
        return back()->with('AboutStore', "About Add Successfully");
    }

    function AboutList(){
        $about = About::all();
        $trush_about = About::onlyTrashed()->get();
        return view('backend.about.about_list',[
            'about' => $about,
            'trush_about' => $trush_about,
        ]);
    }

    function AboutEdit($id){
        $aboutus = About::where('id', $id)->first();
        return view("backend.about.about_edit",[
            'aboutus' => $aboutus,
        ]);
    }

    function AboutUpdate(Request $request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $ext = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $aboutupdate = About::findOrFail($request->about_id);
            $old_img_location = public_path('aboutimages/' . $aboutupdate->image);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }

            Image::make($image)->save(public_path('aboutimages/' . $ext));
            $aboutupdate->image = $ext;

        }
        $aboutupdate->position = $request->position;
        $aboutupdate->description = $request->description;
        $aboutupdate->save();

        return back()->with('AboutUpdate', "About Update Successfully");

    }

    function AboutDelete($id){
        About::findOrFail($id)->delete();
        return back()->with('AboutDelete', "About Delete Successfully");
    }

    function AboutRestore($id){
        About::withTrashed()->findOrFail($id)->restore();
        return back()->with('AboutRestore', "About Restore Successfully");

    }

    function AboutParmanentDelete($id){
        About::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('AboutParmanentDelete', "Category Parmanent Delete Successfully");
    }
}
