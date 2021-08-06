<?php

namespace App\Http\Controllers;
use App\About;
use App\Social;
use App\SocialLink;
use App\Settings;
use Carbon\Carbon;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Http\File;

class SettingsController extends Controller
{
    function AddSettings(){
        $socials = Social::orderBy('socialname', 'asc')->get();
        return view('backend.settings.settings',[
            'socials' => $socials,
        ]);
    }

    function SettingsStore(Request $request){

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');

            $ext = Str::random(10) . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->save(public_path('settings/' . $ext));


            $setting = new Settings;
            $setting->logo = $ext;
            $setting->meta_tag = $request->meta_tag;
            $setting->name = $request->name;
            $setting->email = $request->email;
            $setting->address = $request->address;
            $setting->phone = $request->phone;
            $setting->birthday = $request->birthday;
            $setting->website = $request->website;
            $setting->save();

            $settingAssigns = [];
            foreach($request->social as $key=> $role){
                $settingAssigns[] = [
                    'social' => $role,
                    'setting_id' => $setting->id,
                    'social_id' => $request->social_id[$key],
                ];
            } //return $request->all();

            SocialLink::insert($settingAssigns);

            return back()->with('SettingsStore', "Settings Added Successfully");
        }
    }

    function SettingsList(){
        $setting = Settings::paginate(2);
        $trush_setting = Settings::onlyTrashed()->get();
        return view('backend.settings.settings_list',[
            'setting' => $setting,
            'trush_setting' => $trush_setting,
        ]);
    }

    function SettingsEdit($id){
        $settings = Settings::where('id', $id)->first();
        return view('backend.settings.settings_edit',[
            'settings' => $settings,
        ]);
    }

    function SettingsUpdate(Request $reque){
        if ($reque->hasFile('logo')) {
            $logo = $reque->file('logo');

            $ext = Str::random(10) . '.' . $logo->getClientOriginalExtension();
            $settingupdate = Settings::findOrFail($reque->setting_id);
            $old_img_location = public_path('settings/' . $settingupdate->logo);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }

            Image::make($logo)->save(public_path('settings/' . $ext));
            $settingupdate->logo = $ext;

        }
        $settingupdate->meta_tag = $reque->meta_tag;
        $settingupdate->name = $reque->name;
        $settingupdate->email = $reque->email;
        $settingupdate->address = $reque->address;
        $settingupdate->phone = $reque->phone;
        $settingupdate->birthday = $reque->birthday;
        $settingupdate->website = $reque->website;
        $settingupdate->save();

        return back()->with('SettingsUpdate', "Settings Update Successfully");
    }

    function SettingsDelete($id){
        Settings::findOrFail($id)->delete();
        return back()->with('SettingsDelete', "Settings Delete Successfully");
    }

    function SettingsRestore($id){
        Settings::withTrashed()->findOrFail($id)->restore();
        return back()->with('SettingsRestore', "Settings Restore Successfully");

    }

    function SettingsParmanentDelete($id){
        Settings::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('SettingsParmanentDelete', "Settings Parmanent Delete Successfully");
    }


}
