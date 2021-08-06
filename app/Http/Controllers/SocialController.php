<?php

namespace App\Http\Controllers;

use App\Social;
use App\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    function AddSocial(){
        return view('backend.social.add_social');
    }

    function PostSocial(Request $req){
        $social = new Social;
        $social->socialname = $req->socialname;
        $social->slug = Str::slug($req->socialname);
        $social->save();

        return back()->with('PostSocial', "Social Restore Successfully");
    }

    function SocialList(){
        $social = Social::paginate();
        $trashsocial = Social::onlyTrashed()->get();
        return view('backend.social.social_list',[
            'social' => $social,
            'trashsocial' => $trashsocial,
        ]);
    }

    function SocialEdit($id){
        $socialedit = Social::where('id', $id)->first();
        return view('backend.social.social_edit',[
            'socialedit' => $socialedit,
        ]);
    }

    function SocialUpdate(Request $reque){
        $socialupdate = Social::findOrFail($reque->socialhidden_id);
        $socialupdate->socialname = $reque->socialname;
        $socialupdate->slug = Str::slug($reque->socialname);
        $socialupdate->save();

        return back()->with('SocialUpdate', "Social Restore Successfully");
    }

    function SocialDelete($id){
        Social::findOrFail($id)->delete();
        return back()->with('SocialDelete', "Social Delete Successfully");
    }

    function SocialRestore($id){
        Social::withTrashed()->findOrFail($id)->restore();
        return back()->with('SocialRestore', "Social Restore Successfully");

    }

    function SocialParmanentDelete($id){
        Social::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('SocialParmanentDelete', "Social Parmanent Delete Successfully");
    }

    function SocialLinkList(){
        $sociallink = SocialLink::paginate(5);
        $tslink = SocialLink::onlyTrashed()->get();
        return view('backend.social.sociallinks',[
            'sociallink' => $sociallink,
            'tslink' => $tslink,
        ]);
    }

    function SocialLinkEdit($id){
        $slinks = SocialLink::where('id', $id)->first();
        return view('backend.social.sociallink_edit',[
            'slinks' => $slinks
        ]);
    }

    function SocialLinkUpdate(Request $requests){
        $sociallinkupdate = SocialLink::findOrFail($requests->sociallinks_id);
        $sociallinkupdate->setting_id = $requests->setting_id;
        $sociallinkupdate->social_id = $requests->social_id;
        $sociallinkupdate->social = $requests->social;
        $sociallinkupdate->save();
        return back()->with('SocialLinkUpdate', "SocialLink Delete Successfully");
    }

    function SocialLinkDelete($id){
        SocialLink::findOrFail($id)->delete();
        return back()->with('SocialLinkDelete', "SocialLink Delete Successfully");
    }

    function SocialLinkRestore($id){
        SocialLink::withTrashed()->findOrFail($id)->restore();
        return back()->with('SocialLinkRestore', "SocialLink Restore Successfully");

    }

    function SocialLinkParmanentDelete($id){
        SocialLink::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('SocialLinkParmanentDelete', "SocialLink Parmanent Delete Successfully");
    }







}
