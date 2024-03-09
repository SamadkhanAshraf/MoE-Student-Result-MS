<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::latest()->get();
        return view('admin.school.index',compact('schools'));
    }

    public function archive()
    {
        $schools = School::latest()->onlyTrashed()->get();
        return view('admin.school.archive',compact('schools'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.school.create');

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
            "province" => "required",
            "district" => "required",
            "name_en" => "required|string|min:3|max:50",
            "name_pa" => "required|string|min:3|max:50",
            "name_dr" => "required|string|min:3|max:50",
        ]);


        \DB::beginTransaction();
        try{
            $school = new School();
            $school->name_en = $request->name_en;
            $school->name_pa = $request->name_pa;
            $school->name_dr = $request->name_dr;
            $school->province_id = $request->province;
            $school->district_id = $request->district;
            $school->remark = $request->remarks;
            $school->added_by = \Auth::user()->id;
            if($school->save()){
                \DB::commit();
                return redirect()->route('schools.index')->with('success',trans('msg.success'));

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school= School::find($id);
        return view('admin.school.show',compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school= School::find($id);
        return view('admin.school.edit',compact('school'));
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
            "province" => "required",
            "district" => "required",
            "name_en" => "required|string|min:3|max:50",
            "name_pa" => "required|string|min:3|max:50",
            "name_dr" => "required|string|min:3|max:50",
        ]);


        \DB::beginTransaction();
        try{
            $school =  School::find($id);
            $school->name_en = $request->name_en;
            $school->name_pa = $request->name_pa;
            $school->name_dr = $request->name_dr;
            $school->province_id = $request->province;
            $school->district_id = $request->district;
            $school->remark = $request->remarks;
            $school->edited_by = \Auth::user()->id;
            if($school->save()){
                \DB::commit();
                return redirect()->route('schools.index')->with('success',trans('msg.updated'));

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function addToArchive($id)
     {
        \DB::beginTransaction();
        try{
            $school = School::find($id);

            $school->deleted_by = \Auth::user()->id;
             if($school->save() && $school->delete()){
                \DB::commit();
                return back()->with('success',trans('msg.your-recard-added-to-archive'));
             }
             else{
                \DB::rollback();
                 return back()->with('error',trans('msg.failed'));
             }
        }catch(Exception $ex){
            \DB::rollback();
            return back()->with('error', $ex->getMessage());;
        }

     }



    public function restore($id)
    {
        \DB::beginTransaction();
        try{
            if(School::onlyTrashed()->find($id)->restore()){
                \DB::commit();
                return back()->with('success',__('msg.restored'));
            }else{
                \DB::rollback();
                return back()->with('error',__('msg.failed'));
            }
        }catch(Exception $ex){
            \DB::rollback();
            return back()->with('error', $ex->getMessage());;
        }



    }


    public function restoreAll(){
        \DB::beginTransaction();
        try{
            if(School::onlyTrashed()->restore()){
                \DB::commit();
                return back()->with('success',__('msg.restored'));
            }
            else{
                \DB::rollback();
                return back()->with('error',__('msg.failed'));
            }
        }catch(Exception $ex){
            \DB::rollback();
            return back()->with('error', $ex->getMessage());;
        }

    }


    public function destroy($id)
    {
        \DB::beginTransaction();
        try{
            if(School::where('id',$id)->forceDelete()){
                \DB::commit();
                return back()->with('success',trans('msg.deleted'));
            }
            else{
                \DB::rollback();
                return back()->with('error',trans('msg.failed'));
            }
        }catch(Exception $ex){
            \DB::rollback();
            return back()->with('error', $ex->getMessage());;
        }
    }
}
