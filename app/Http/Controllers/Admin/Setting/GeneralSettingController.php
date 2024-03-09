<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\GeneralSetting;

class GeneralSettingController extends Controller
{

    public function showSetting(){
        $setting = GeneralSetting::where('lang',\App::getLocale())->first();
        return view('admin.setting.general-setting.show-setting',compact('setting'));
    }

    public function updateSetting($id, Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     =>'required|email',
            'logo'      => "nullable|image|mimes:jpg,png,jpeg,gif,svg|max:512",
            'phone'     =>'required|min:10|max:15',
        ]);
        $setting = GeneralSetting::where('id',$id)->first();
        $result = null;

        if($setting){
            $setting->name = $request->name;
            $setting->email = $request->email;
            $setting->email_password = $request->password;
            $setting->phone = $request->phone;
            $setting->whatsapp = $request->whatsapp;
            $setting->telegram = $request->telegram;
            $setting->instagram = $request->instagram;
            $setting->linkedin = $request->linkedin;
            $setting->twitter = $request->twitter;
            $setting->youtube = $request->youtube;
            $setting->google_map = $request->googleMap;
            $setting->address = $request->address;

            if($request->logo){
                $setting->logo = Helper::updateImage($request->logo, $setting->logo,'logos');
            }
            $setting->user_id = \Auth::user()->id;
            $result = $setting->save();
        }
        else{
            $setting = new GeneralSetting();
            $setting->name = $request->name;
            $setting->email = $request->email;
            $setting->email_password = $request->password;
            $setting->phone = $request->phone;
            $setting->whatsapp = $request->whatsapp;
            $setting->telegram = $request->telegram;
            $setting->instagram = $request->instagram;
            $setting->linkedin = $request->linkedin;
            $setting->twitter = $request->twitter;
            $setting->youtube = $request->youtube;
            $setting->google_map = $request->googleMap;
            $setting->address = $request->address;
            $setting->user_id = \Auth::user()->id;
            $setting->lang = \App::getLocale();
            if($request->logo){
                $setting->logo = Helper::uploadFile($request->logo);
            }
            $result = $setting->save();
        }
        if($result){
            return back()->with('success',trans('msg.success'));
        }
        else{
            return back()->with('error',trans('msg.failed'));
        }

    }
}
