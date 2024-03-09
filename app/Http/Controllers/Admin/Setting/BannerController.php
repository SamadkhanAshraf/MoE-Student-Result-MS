<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\BannerImage;
use App\Helpers\Helper;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = BannerImage::where('lang', '=', \App::getLocale())->latest()->get();
        return view('admin.setting.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'bannerImage'=>'required|image|mimes:png,jpg,jpge,svg|max:2048',
        ]);

        $banner = new BannerImage();

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->details = $request->details;
        $banner->lang = \App::getLocale();
        $banner->user_id = \Auth::user()->id;
        if($request->bannerImage){
            $banner->image = Helper::uploadFile($request->bannerImage);
        }

        if($banner->save()) {
            return redirect()->route('banners.index')->with('success', trans('msg.success'));
        }
        if($banner->save()) {
            return back()->with('errar', trans('msg.failed'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner= BannerImage::find($id);
        return view('admin.setting.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'bannerImage'=>'nullable|image|mimes:png,jpg,jpge,svg|max:2048',
        ]);

        $banner =  BannerImage::find($id);

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->details = $request->details;
        $banner->user_id = \Auth::user()->id;
        if($request->bannerImage){
            $banner->image = Helper::updateFile($request->bannerImage,$banner->image);
        }

        if($banner->save()) {
            return redirect()->route('banners.index')->with('success', trans('msg.updated'));
        }
        if($banner->save()) {
            return back()->with('errar', trans('msg.failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner= BannerImage::find($id);
        if($banner->delete()) {
            return back()->with('success', trans('msg.deleted'));
        }
        if($banner->save()) {
            return back()->with('errar', trans('msg.failed'));
        }

    }
}
