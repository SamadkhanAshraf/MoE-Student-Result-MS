<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collage;
use App\Models\CollageDepartments;

class CollageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collages = Collage::latest()->get();
        return view('admin.collage.index',compact('collages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.collage.create');

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
            "name_en" => "required|string|min:3|max:255",
            "name_pa" => "required|string|min:3|max:255",
            "name_dr" => "required|string|min:3|max:255",
            'department'=>'required'
        ]);


        \DB::beginTransaction();
        try{
            $collage = new collage();
            $collage->name_en = $request->name_en;
            $collage->name_pa = $request->name_pa;
            $collage->name_dr = $request->name_dr;
            $collage->province_id = $request->province;
            $collage->remark = $request->remarks;
            $collage->added_by = \Auth::user()->id;
            if($collage->save()){
                foreach($request->department as $dep){
                    CollageDepartments::create([
                        'dep_id'=>$dep,
                        'collage_id'=>$collage->id
                    ]);
                }
                \DB::commit();
                return redirect()->route('collages.index')->with('success',trans('msg.success'));

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
        $collage= Collage::find($id);
        return view('admin.collage.show',compact('collage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collage= Collage::find($id);
        return view('admin.collage.edit',compact('collage'));

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
            "name_en" => "required|string|min:3|max:255",
            "name_pa" => "required|string|min:3|max:255",
            "name_dr" => "required|string|min:3|max:255",
        ]);


        \DB::beginTransaction();
        try{
            $collage =  Collage::find($id);
            $collage->name_en = $request->name_en;
            $collage->name_pa = $request->name_pa;
            $collage->name_dr = $request->name_dr;
            $collage->province_id = $request->province;
            $collage->remark = $request->remarks;
            $collage->edited_by = \Auth::user()->id;

            $colageDep=CollageDepartments::where('collage_id',$collage->id);
            if($colageDep){
                $colageDep->delete();
            }

            if($collage->save()){
                foreach($request->department as $dep){
                    CollageDepartments::create([
                        'dep_id'=>$dep,
                        'collage_id'=>$collage->id
                    ]);
                }
                \DB::commit();
                return redirect()->route('collages.index')->with('success',trans('msg.updated'));

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
            if(Collage::find($id)->delete()){
                $colageDep=CollageDepartments::where('collage_id',$id);
                if($colageDep){
                    $colageDep->delete();
                }

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

    public function getCollage($id){
        return response()->json(Collage::where('province_id',$id)->get());
    }
    public function getDepartments($id){
        return response()->json(Collage::find($id));
    }
}
