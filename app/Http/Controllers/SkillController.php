<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    function SkillAdd(){
        return view('backend.skill.skill_add');
    }

    function SkillStore(Request $request){
        $skill = new Skill;
        $skill->skill = $request->skill;
        $skill->percent = $request->percent;
        $skill->save();

        return back();
    }

    function SkillList(){
        $skills = Skill::paginate(5);
        $trash_skill = Skill::onlyTrashed()->get();
        return view('backend.skill.skill_list',[
            'skills' => $skills,
            'trash_skill' => $trash_skill,
        ]);
    }

    function SkillEdit($id){
        $skills = Skill::where('id', $id)->first();
        return view('backend.skill.skill_edit',[
            'skills' => $skills,
        ]);
    }

    function SkillUpdate(Request $req){
        $skillupdate = Skill::findOrFail($req->skill_id);
        $skillupdate->skill = $req->skill;
        $skillupdate->percent = $req->percent;
        $skillupdate->save();

        return back()->with('SkillUpdate', "Skill Update Successfully");
    }

    function SkillDelete($id){
        Skill::findOrFail($id)->delete();
        return back()->with('SkillDelete', "Skill Delete Successfully");
    }

    function SkillRestore($id){
        Skill::withTrashed()->findOrFail($id)->restore();
        return back()->with('SkillRestore', "Skill Restore Successfully");

    }

    function SkillParmanentDelete($id){
        Skill::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('SkillParmanentDelete', "Skill Parmanent Delete Successfully");
    }
}
