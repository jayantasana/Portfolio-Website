<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    function ExperienceAdd(){
        return view('backend.experience.experience_add');
    }

    function ExperienceStore(Request $request){

        $experience = new Experience;
        $experience->times = $request->times;
        $experience->position = $request->position;
        $experience->description = $request->description;
        $experience->save();

        return back()->with('ExperienceStore', "Experience Added Successfully");

    }

    function ExperienceList(){
        $experience = Experience::paginate();
        $trushexperience = Experience::onlyTrashed()->get();
        return view('backend.experience.experience_list',[
            'experience' => $experience,
            'trushexperience' => $trushexperience,
        ]);
    }

    function ExperienceEdit($id){
        $experienceed = Experience::where('id', $id)->first();
        return view("backend.experience.experience_edit",[
            'experienceed' => $experienceed,
        ]);
    }

    function ExperienceUpdate(Request $requ){
        $experience_update = Experience::findOrFail($requ->experience_id);
        $experience_update->times = $requ->times;
        $experience_update->position = $requ->position;
        $experience_update->description = $requ->description;
        $experience_update->save();

        return back()->with('ExperienceUpdate', "Experience Update Successfully");
    }

    function ExperienceDelete($id){
        Experience::findOrFail($id)->delete();
        return back()->with('ExperienceDelete', "Experience Delete Successfully");
    }

    function ExperienceRestore($id){
        Experience::withTrashed()->findOrFail($id)->restore();
        return back()->with('ExperienceRestore', "Experience Restore Successfully");

    }

    function ExperienceParmanentDelete($id){
        Experience::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('ExperienceParmanentDelete', "Experience Parmanent Delete Successfully");
    }
}
