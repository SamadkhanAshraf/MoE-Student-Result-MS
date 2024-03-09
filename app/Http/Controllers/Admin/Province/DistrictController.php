<?php

namespace App\Http\Controllers\Admin\Province;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province\District;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::latest()->get();
        return view('admin.province.districts',compact('districts'));
    }

    public function archive()
    {
        $districts = District::latest()->onlyTrashed()->get();
        return view('admin.province.districts-archive',compact('districts'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'province'=>'required|exists:provinces,id',
            'englishName'=>'required|string|min:3',
            'pashtoName'=>'required|string|min:3',
            'dariName'=>'required|string|min:3',
            'remark'=>'nullable|string|min:5',
        ]);
        $district = new District();
        $district->name_en = $request->englishName;
        $district->name_pa = $request->pashtoName;
        $district->name_dr = $request->dariName;
        $district->province_id = $request->province;
        $district->remark = $request->remark;
        $district->added_by= \Auth::user()->id;
        if($district->save()){
            return back()->with('success',trans('msg.success'));
        }
        else{
            return back()->with('error',trans('msg.failed'));
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
        //
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
            'province'=>'required|exists:provinces,id',
            'englishName'=>'required|string|min:3',
            'pashtoName'=>'required|string|min:3',
            'dariName'=>'required|string|min:3',
            'remark'=>'nullable|string|min:5',
        ]);
        $district =  District::find($id);
        $district->name_en = $request->englishName;
        $district->name_pa = $request->pashtoName;
        $district->name_dr = $request->dariName;
        $district->province_id = $request->province;
        $district->remark = $request->remark;
        $district->edited_by= \Auth::user()->id;
        if($district->save()){
            return back()->with('success',trans('msg.updated'));
        }
        else{
            return back()->with('error',trans('msg.failed'));
        }
    }

    public function addToArchive($id)
    {
        if(District::find($id)->delete()){
            return back()->with('success',trans('msg.your-recard-added-to-archive'));
        }
        else{
            return back()->with('error',trans('msg.failed'));
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
        if(District::where('id',$id)->forceDelete()){
            return back()->with('success',trans('msg.deleted'));
        }
        else{
            return back()->with('error',trans('msg.failed'));
        }
    }

    public function restore($id)
    {
        if(District::onlyTrashed()->find($id)->restore()){
            return back()->with('success',__('msg.restored'));
        }else{
            return back()->with('error',__('msg.failed'));
        }
    }

    public function restoreAll(){
        if(District::onlyTrashed()->restore()){
            return back()->with('success',__('msg.restored'));
        }
        else{
            return back()->with('error',__('msg.failed'));
        }
    }
    
    public function getDistrict($id){
        return response()->json(District::where('province_id',$id)->get());
    }
}
