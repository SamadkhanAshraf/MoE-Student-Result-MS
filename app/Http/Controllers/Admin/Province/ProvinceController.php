<?php

namespace App\Http\Controllers\Admin\Province;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::latest()->get();
        return view('admin.province.provinces',compact('provinces'));
    }

    public function archive()
    {
        $provinces = Province::latest()->onlyTrashed()->get();
        return view('admin.province.province-archive',compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'englishName'=>'required|string|min:3',
            'pashtoName'=>'required|string|min:3',
            'dariName'=>'required|string|min:3',
            'remark'=>'nullable|string|min:5',
        ]);

        $province = new Province();
        $province->name_en = $request->englishName;
        $province->name_pa = $request->pashtoName;
        $province->name_dr = $request->dariName;
        $province->remark = $request->remark;
        $province->added_by= \Auth::user()->id;
        if($province->save()){
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
            'englishName'=>'required|string|min:3',
            'pashtoName'=>'required|string|min:3',
            'dariName'=>'required|string|min:3',
            'remark'=>'nullable|string|min:5',
        ]);

        $province = Province::find($id);
        $province->name_en = $request->englishName;
        $province->name_pa = $request->pashtoName;
        $province->name_dr = $request->dariName;
        $province->remark = $request->remark;
        $province->edited_by = \Auth::user()->id;
        if($province->save()){
            return back()->with('success',trans('msg.updated'));
        }
        else{
            return back()->with('error',trans('msg.failed'));
        }
    }

    public function addToArchive($id)
    {
        if(Province::find($id)->delete()){
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
        
        $province = Province::onlyTrashed()->where('id',$id)->get()->first();
        \DB::beginTransaction();
        try{
            if($province->forceDelete()){
                \App\Models\Province\District::onlyTrashed()->where('province_id',$province->id);
                \DB::commit();
                return back()->with('success',trans('msg.deleted'));
            }
            else{
                \DB::rollback();
                return back()->with('error',trans('msg.failed'));
            }
        }
        catch(Exception $ex){
            \DB::rollback();
            return back()->with('error', $ex->getMessage());;
        }
    
        
    }

    public function restore($id)
    {
        if(Province::onlyTrashed()->find($id)->restore()){
            return back()->with('success',__('msg.restored'));
        }else{
            return back()->with('error',__('msg.failed'));
        }
    }

    public function restoreAll(){
        if(Province::onlyTrashed()->restore()){
            return back()->with('success',__('msg.restored'));
        }
        else{
            return back()->with('error',__('msg.failed'));
        }
    }
}
