<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.departments.index',['departments' =>Departments::latest()->get()]);
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
            'englishName'=>'required|string|max:255|min:3',
            'pashtoName'=>'required|string|max:255|min:3',
            'dariName'=>'required|string|max:255|min:3',
            'remarks'=>'nullable|string'
        ]);

        \DB::beginTransaction();
        try{
            $department = new Departments();
            $department->name_en = $request->englishName;
            $department->name_pa = $request->pashtoName;
            $department->name_dr = $request->dariName;
            $department->remark = $request->remarks;
            $department->added_by = \Auth::user()->id;
            if($department->save()){
                \DB::commit();
                return redirect()->route('departments.index')->with('success',trans('msg.success'));

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
            'englishName'=>'required|string|max:255|min:3',
            'pashtoName'=>'required|string|max:255|min:3',
            'dariName'=>'required|string|max:255|min:3',
            'remarks'=>'nullable|string'
        ]);

        \DB::beginTransaction();
        try{
            $department =  Departments::find($id);
            $department->name_en = $request->englishName;
            $department->name_pa = $request->pashtoName;
            $department->name_dr = $request->dariName;
            $department->remark = $request->remarks;
            $department->edited_by = \Auth::user()->id;
            if($department->save()){
                \DB::commit();
                return redirect()->route('departments.index')->with('success',trans('msg.updated'));

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
    public function destroy($id)
    {
        \DB::beginTransaction();
        try{
            $department =  Departments::find($id);
            if($department->forceDelete()){
                \DB::commit();
                return redirect()->route('departments.index')->with('success',trans('msg.deleted'));

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
}
