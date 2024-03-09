<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\IdentityScan;
use App\Models\ResultSheetAppendixScanSemester1;
use App\Models\ResultSheetAppendixScanSemester2;
use App\Models\ResultSheetAppendixScanSemester3;
use App\Models\ResultSheetAppendixScanSemester4;
use App\Models\ResultSheetScanSemester1;
use App\Models\ResultSheetScanSemester2;
use App\Models\ResultSheetScanSemester3;
use App\Models\ResultSheetScanSemester4;
use App\Models\StudentResultSemester1;
use App\Models\StudentResultSemester2;
use App\Models\StudentResultSemester3;
use App\Models\StudentResultSemester4;
use App\Models\Student;
use App\Helpers\Helper;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $students =  Student::latest()->where('type',\Auth::user()->type)
       ->where('service',\Auth::user()->service)->get();
        return view('admin.student.index',([
            'students'=>$students,
            'province'=>null,
            'collage'=>null,
            'department'=>null,
            'name'=>null,
            'year'=>null,
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'studentIdintityForm'=>'required|image|mimes:png,jpg,jpge,svg',
            "province" => "required",
            "collage" => "required",
            "department" => "required",
            "year" => "required|max:4|min:4",
            "status" => "required",
            "remarks" => "nullable|string|max:255",
            "name.*" => 'required|string|max:255|min:2',
            "fatherName.*" =>'required|string|max:255|min:2',
            "entryDate.*" => 'required|max:4|min:4',
            // "graduationDate.*" => 'required|max:4|min:4',
            "appendex.*" => 'nullable|image|mimes:png,jpg,jpge,svg',
        ],[
            'studentIdintityForm.required'=>__('msg.please-select-std-identity-form'),
            'studentIdintityForm.image'=>__('msg.std-identity-form-must-be-image'),
            'studentIdintityForm.mimes'=>__('msg.std-identity-form-format-must-be-png-jpg-jpeg-svg'),
            'province.required'=>__('msg.please-select-related-province'),
            'collage.required'=>__('msg.please-select-related-collage'),
            'department.required'=>__('msg.please-select-related-department'),
            "status.required" => __('msg.please-select-identity-form-status'),
            'year.required'=>__('msg.please-enter-graduation-year'),
            'name.*.required'=>__('msg.please-enter-student-name'),
            'name.*.string'=>__('msg.please-enter-valid-student-name'),
            'fatherName.*.required'=>__('msg.please-enter-student-father-name'),
            'fatherName.*.string'=>__('msg.please-enter-valid-student-father-name'),
            'entryDate.*.required'=>__('msg.please-enter-student-entry-year'),
            'appendex.image'=>__('msg.std-identity-form-appendix-must-be-image'),
            'appendex.mimes'=>__('msg.std-identity-form-appendix-format-must-be-png-jpg-jpeg-svg'),

        ]);

        if (!$validator->passes()) {
            return response()->json(['msg'=>$validator->errors()->all(),'status'=>401]);
        }
        else{

            \DB::beginTransaction();
            try{

                $scanForm= new IdentityScan();
                $scanForm->province_id = $request->province;
                $scanForm->collage_id = $request->collage;
                $scanForm->department_id = $request->department;
                $scanForm->year = $request->year;
                $scanForm->status = $request->status;
                $scanForm->remark = $request->remarks;
                if($request->studentIdintityForm ){
                    $scanForm->scan_path = Helper::uploadImage($request->studentIdintityForm,'idintity-scans');
                }
                $scanForm->type = \Auth::user()->type;
                $scanForm->service = \Auth::user()->service;
                $scanForm->added_by = \Auth::user()->id;
                $result =  $scanForm->save();

                if($request->appendex ){
                    foreach ($request->appendex as $key => $append) {
                        $appendix= new IdentityScanAppendex();
                        $appendix->scan_path = Helper::uploadImage($append,'idintity-appendixes');
                        $appendix->identity_scan_id =$scanForm->id;
                        $appendix->added_by= \Auth::user()->id;
                        $appendix->save();
                    }
                }

                foreach ($request->name as $key => $name) {
                    $student= new Student();
                    $student->name = $name;
                    $student->father_name=$request->fatherName[$key];
                    $student->entery_year=$request->entryDate[$key];
                    $student->graduation_year=$request->year;

                    $student->collage_province_id=$request->province;
                    $student->collage_id=$request->collage;
                    $student->department_id=$request->department;
                    $student->identity_scan_id=$scanForm->id;

                    $student->type = \Auth::user()->type;
                    $student->service = \Auth::user()->service;
                    $student->added_by = \Auth::user()->id;
                    $student->save();
                }

                if($result){
                    \DB::commit();
                    return response()->json(['status'=>200,'msg'=>trans('msg.success')]);

                }
                else{
                    \DB::rollback();
                    return response()->json(['status'=>402,'msg'=>trans('msg.error')]);
                }
            }
            catch(Exception $ex){
                \DB::rollback();
                return response()->json(['status'=>403,'msg'=>$ex->getMessage()]);
            }

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
        $student =  Student::find($id);
        return view('admin.student.show',([
            'student'=>$student,
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.student.edit',['student'=>Student::find($id)]);
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
        $validator = Validator::make($request->all(), [
            'studentIdintityForm'=>'nullable||mimes:png,jpg,jpge,svg|max:2048',
            "province" => "required",
            "collage" => "required",
            "department" => "required",
            "year" => "required|max:4|min:4",
            "status" => "required",
            "remarks" => "nullable|string|max:255",
            "name" => 'required|string|max:255|min:2',
            "fatherName" =>'required|string|max:255|min:2',
            "entryDate" => 'required|max:4|min:4',
            // "graduationDate" => 'required|max:4|min:4',
            "appendex.*" => 'nullable||mimes:png,jpg,jpge,svg|max:2048',
        ],
        [
            'studentIdintityForm.image'=>__('msg.std-identity-form-must-be-image'),
            'studentIdintityForm.mimes'=>__('msg.std-identity-form-format-must-be-png-jpg-jpeg-svg'),
            'province.required'=>__('msg.please-select-related-province'),
            'collage.required'=>__('msg.please-select-related-collage'),
            'department.required'=>__('msg.please-select-related-department'),
            "status.required" => __('msg.please-select-identity-form-status'),
            'year.required'=>__('msg.please-enter-graduation-year'),
            'name.required'=>__('msg.please-enter-student-name'),
            'name.string'=>__('msg.please-enter-valid-student-name'),
            'fatherName.required'=>__('msg.please-enter-student-father-name'),
            'fatherName.string'=>__('msg.please-enter-valid-student-father-name'),
            'entryDate.required'=>__('msg.please-enter-student-entry-year'),
            'appendex.image'=>__('msg.std-identity-form-appendix-must-be-image'),
            'appendex.mimes'=>__('msg.std-identity-form-appendix-format-must-be-png-jpg-jpeg-svg'),

        ]);


        if (!$validator->passes()) {
            return response()->json(['msg'=>$validator->errors()->all(),'status'=>401]);
        }
        else{

            \DB::beginTransaction();
            try{
                $student = Student::find($id);

                //updatiing Identity Scan Form
                $student->identityScan->province_id = $request->province;
                $student->identityScan->collage_id = $request->collage;
                $student->identityScan->department_id = $request->department;
                $student->identityScan->year = $request->year;
                $student->identityScan->status = $request->status;
                $student->identityScan->remark = $request->remarks;
                if($request->studentIdintityForm ){
                   $student->identityScan->scan_path = Helper::updateImage($request->studentIdintityForm,$student->identityScan->scan_path,'idintity-scans');
                }
                $student->identityScan->edited_by = \Auth::user()->id;
                $result =  $student->identityScan->save();

                //updatiing Identity Scan Form Appendixes

                if ($request->oldAppendixs) {
                    IdentityScanAppendex::where('identity_scan_id',$student->identityScan->id)->forceDelete();
                    foreach ($request->oldAppendixs as $key => $oldAppendix) {
                        $appendix= new IdentityScanAppendex();
                        $appendix->scan_path = $oldAppendix;
                        $appendix->identity_scan_id =$student->identityScan->id;
                        $appendix->added_by= \Auth::user()->id;
                        $appendix->edited_by= \Auth::user()->id;
                        $appendix->save();
                    }
                }
                if($request->file('appendex') ){
                    foreach ($request->appendex as $key => $append) {
                        $appendix= new IdentityScanAppendex();
                        $appendix->scan_path = Helper::uploadImage($append,'idintity-appendixes');
                        $appendix->identity_scan_id =$student->identityScan->id;
                        $appendix->added_by= \Auth::user()->id;
                        $appendix->edited_by= \Auth::user()->id;
                        $appendix->save();
                    }
                }

                //updateing Student Info
                $student->name = $request->name;
                $student->father_name=$request->fatherName;
                $student->entery_year=$request->entryDate;
                $student->graduation_year=$request->year;
                $student->collage_province_id=$request->province;
                $student->collage_id=$request->collage;
                $student->department_id=$request->department;

                $student->edited_by = \Auth::user()->id;
                $student->save();

                if($result){
                    \DB::commit();
                    return response()->json(['status'=>200,'msg'=>trans('msg.updated')]);

                }
                else{
                    \DB::rollback();
                    return response()->json(['status'=>402,'msg'=>trans('msg.error')]);
                }
            }
            catch(Exception $ex){
                \DB::rollback();
                return response()->json(['status'=>403,'msg'=>$ex->getMessage()]);
            }

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
            $student = Student::find($id);

            $student->deleted_by = \Auth::user()->id;
             if($student->save() && $student->forceDelete()){
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





    // create Student Result Sheet
    public function createStudentResult()
    {
        return view('admin.student.create-student-result');
    }

    // create Student Result Sheet
    public function storeStudentResult(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'studentResultForm'=>'required|image|mimes:png,jpg,jpge,svg',
            "province" => "required",
            "collage" => "required",
            "department" => "required",
            "year" => "required|max:4|min:4",
            "semester" => "required",
            "remarks" => "nullable|string|max:255",
            "students" => 'required',
            "appendex.*" => 'nullable|image|mimes:png,jpg,jpge,svg',
        ],[
            'studentResultForm.required'=>__('msg.please-select-std-result-sheet'),
            'studentResultForm.image'=>__('msg.std-resutl-sheet-must-be-image'),
            'studentResultForm.mimes'=>__('msg.std-resutl-sheet-format-must-be-png-jpg-jpeg-svg'),
            'province.required'=>__('msg.please-select-related-province'),
            'collage.required'=>__('msg.please-select-related-collage'),
            'department.required'=>__('msg.please-select-related-department'),
            'year.required'=>__('msg.please-enter-result-sheet-year'),
            'semester.required'=>__('msg.please-select-semester'),
            'students.required'=>__('msg.please-select-student-from-list'),
            'appendex.image'=>__('msg.std-resutl-sheet-appendix-must-be-image'),
            'appendex.mimes'=>__('msg.std-resutl-sheet-appendix-format-must-be-png-jpg-jpeg-svg'),

        ]);

        if (!$validator->passes()) {
            return response()->json(['msg'=>$validator->errors()->all(),'status'=>401]);
        }
        else{

            \DB::beginTransaction();
            try{

                $resultSheetAppendix;
                $resultSheetScan;
                $student;

                if($request->semester==='1'){
                    $resultSheetScan = new ResultSheetScanSemester1();
                }

                else if($request->semester==='2'){
                    $resultSheetScan = new ResultSheetScanSemester2();
                }

                else if($request->semester==='3'){
                    $resultSheetScan = new ResultSheetScanSemester3();
                }

                else if($request->semester==='4'){
                    $resultSheetScan = new ResultSheetScanSemester4();
                }

                $resultSheetScan->province_id = $request->province;
                $resultSheetScan->collage_id = $request->collage;
                $resultSheetScan->department_id = $request->department;
                $resultSheetScan->year = $request->year;
                $resultSheetScan->remark = $request->remarks;
                if($request->studentResultForm ){
                    $resultSheetScan->scan_path = Helper::uploadImage($request->studentResultForm,'result-sheet-scans');
                }
                $resultSheetScan->type = \Auth::user()->type;
                $resultSheetScan->service = \Auth::user()->service;
                $resultSheetScan->added_by = \Auth::user()->id;
                $result =  $resultSheetScan->save();

                if($request->appendex ){

                    foreach ($request->appendex as  $append) {
                        if($request->semester==='1'){
                            $resultSheetAppendix = new ResultSheetAppendixScanSemester1();
                        }

                        else if($request->semester==='2'){
                            $resultSheetAppendix = new ResultSheetAppendixScanSemester2();
                        }

                        else if($request->semester==='3'){
                            $resultSheetAppendix = new ResultSheetAppendixScanSemester3();
                        }

                        else if($request->semester==='4'){
                            $resultSheetAppendix = new ResultSheetAppendixScanSemester4();
                        }
                        $resultSheetAppendix->scan_path = Helper::uploadImage($append,'result-sheet-appendix');
                        $resultSheetAppendix->result_sheet_id =$resultSheetScan->id;
                        $resultSheetAppendix->added_by= \Auth::user()->id;
                        $resultSheetAppendix->save();

                    }
                }

                foreach ($request->students as  $studentId) {

                    if($request->semester==='1'){
                        $student = new StudentResultSemester1();
                    }

                    else if($request->semester==='2'){
                        $student = new StudentResultSemester2();
                    }

                    else if($request->semester==='3'){
                        $student = new StudentResultSemester3();
                    }

                    else if($request->semester==='4'){
                        $student = new StudentResultSemester4();
                    }

                    $student->result_sheet_id = $resultSheetScan->id;
                    $student->student_id = $studentId;
                    $student->save();
                }

                if($result){
                    \DB::commit();
                    return response()->json(['status'=>200,'msg'=>trans('msg.success')]);

                }
                else{
                    \DB::rollback();
                    return response()->json(['status'=>402,'msg'=>trans('msg.error')]);
                }
            }
            catch(Exception $ex){
                \DB::rollback();
                return response()->json(['status'=>403,'msg'=>$ex->getMessage()]);
            }

        }
    }


    public function editStudentResult($id,$semester){
        $resultSheet =null;
        if($semester==='1'){
           $resultSheet= ResultSheetScanSemester1::find($id);
        }
        else if($semester==='2'){
            $resultSheet= ResultSheetScanSemester2::find($id);
        }
        else if($semester==='3'){
            $resultSheet= ResultSheetScanSemester3::find($id);
        }
        else if($semester==='4'){
            $resultSheet= ResultSheetScanSemester4::find($id);
        }

        return view('admin.student.edit-student-result',[
            'resultSheet'=>$resultSheet,
            'semester'=>$semester
        ]);
    }

    public function updateStudentResult(Request $request, $id)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'studentResultForm'=>'nullable|image|mimes:png,jpg,jpge,svg',
            "province" => "required",
            "collage" => "required",
            "department" => "required",
            "year" => "required|max:4|min:4",
            'oldSemester'=>'required',
            "semester" => "required",
            "remarks" => "nullable|string|max:255",
            "students" => 'required',
            "appendex.*" => 'nullable|image|mimes:png,jpg,jpge,svg',
        ],[
            'studentResultForm.required'=>__('msg.please-select-std-result-sheet'),
            'studentResultForm.image'=>__('msg.std-resutl-sheet-must-be-image'),
            'studentResultForm.mimes'=>__('msg.std-resutl-sheet-format-must-be-png-jpg-jpeg-svg'),
            'province.required'=>__('msg.please-select-related-province'),
            'collage.required'=>__('msg.please-select-related-collage'),
            'department.required'=>__('msg.please-select-related-department'),
            'year.required'=>__('msg.please-enter-result-sheet-year'),
            'semester.required'=>__('msg.please-select-semester'),
            'students.required'=>__('msg.please-select-student-from-list'),
            'appendex.image'=>__('msg.std-resutl-sheet-appendix-must-be-image'),
            'appendex.mimes'=>__('msg.std-resutl-sheet-appendix-format-must-be-png-jpg-jpeg-svg'),

        ]);

        if (!$validator->passes()) {
            return response()->json(['msg'=>$validator->errors()->all(),'status'=>401]);
        }
        else{

            \DB::beginTransaction();
            try{

                $resultSheetAppendix;
                $resultSheetScan;
                $student;

                if($request->semester==='1'){
                    $resultSheetScan = new ResultSheetScanSemester1();
                }

                else if($request->semester==='2'){
                    $resultSheetScan = new ResultSheetScanSemester2();
                }

                else if($request->semester==='3'){
                    $resultSheetScan = new ResultSheetScanSemester3();
                }

                else if($request->semester==='4'){
                    $resultSheetScan = new ResultSheetScanSemester4();
                }

                $resultSheetScan->province_id = $request->province;
                $resultSheetScan->collage_id = $request->collage;
                $resultSheetScan->department_id = $request->department;
                $resultSheetScan->year = $request->year;
                $resultSheetScan->remark = $request->remarks;
                if($request->studentResultForm ){
                    $resultSheetScan->scan_path = Helper::uploadImage($request->studentResultForm,'result-sheet-scans');
                }
                $resultSheetScan->type = \Auth::user()->type;
                $resultSheetScan->service = \Auth::user()->service;
                $resultSheetScan->added_by = \Auth::user()->id;
                $result =  $resultSheetScan->save();

                if($request->appendex ){

                    foreach ($request->appendex as  $append) {
                        if($request->semester==='1'){
                            $resultSheetAppendix = new ResultSheetAppendixScanSemester1();
                        }

                        else if($request->semester==='2'){
                            $resultSheetAppendix = new ResultSheetAppendixScanSemester2();
                        }

                        else if($request->semester==='3'){
                            $resultSheetAppendix = new ResultSheetAppendixScanSemester3();
                        }

                        else if($request->semester==='4'){
                            $resultSheetAppendix = new ResultSheetAppendixScanSemester4();
                        }
                        $resultSheetAppendix->scan_path = Helper::uploadImage($append,'result-sheet-appendix');
                        $resultSheetAppendix->result_sheet_id =$resultSheetScan->id;
                        $resultSheetAppendix->added_by= \Auth::user()->id;
                        $resultSheetAppendix->save();

                    }
                }

                foreach ($request->students as  $studentId) {

                    if($request->semester==='1'){
                        $student = new StudentResultSemester1();
                    }

                    else if($request->semester==='2'){
                        $student = new StudentResultSemester2();
                    }

                    else if($request->semester==='3'){
                        $student = new StudentResultSemester3();
                    }

                    else if($request->semester==='4'){
                        $student = new StudentResultSemester4();
                    }

                    $student->result_sheet_id = $resultSheetScan->id;
                    $student->student_id = $studentId;
                    $student->save();
                }

                if($result){
                    \DB::commit();
                    return response()->json(['status'=>200,'msg'=>trans('msg.success')]);

                }
                else{
                    \DB::rollback();
                    return response()->json(['status'=>402,'msg'=>trans('msg.error')]);
                }
            }
            catch(Exception $ex){
                \DB::rollback();
                return response()->json(['status'=>403,'msg'=>$ex->getMessage()]);
            }

        }
    }


    public function searchStudents(Request $request){
        $request->validate([
            "province" => "required",
            "collage" => "required",
            "department" => "required",
        ],[
            "province.required" => __('msg.please select province'),
            "collage.required" => __('msg.please select collage'),
            "department.required" => __('msg.please select department'),
        ]);

        if($request->year===null && $request->name===null){

            $students =  Student::where('collage_province_id',$request->province)
            ->where('type',\Auth::user()->type)
            ->where('service',\Auth::user()->service)
            ->where('collage_id',$request->collage)
            ->where('department_id',$request->department)
            ->get();
        }

        elseif($request->year!==null && $request->name===null){

            $students =  Student::where('collage_province_id',$request->province)
            ->where('type',\Auth::user()->type)
            ->where('service',\Auth::user()->service)
            ->where('collage_id',$request->collage)
            ->where('department_id',$request->department)
            ->where('graduation_year',$request->year)
            ->get();
        }

        if($request->year===null  && $request->name!==null){
            $students =  Student::where('collage_province_id',$request->province)
            ->where('type',\Auth::user()->type)
            ->where('service',\Auth::user()->service)
            ->where('collage_id',$request->collage)
            ->where('department_id',$request->department)
            ->where('name','like', '%'.$request->name.'%')
            ->get();
        }

        if($request->year!==null && $request->name!==null){
            $students =  Student::where('collage_province_id',$request->province)
            ->where('type',\Auth::user()->type)
            ->where('service',\Auth::user()->service)
            ->where('collage_id',$request->collage)
            ->where('department_id',$request->department)
            ->where('graduation_year',$request->year)
            ->where('name','like', '%'.$request->name.'%')
            ->get();
        }

        return view('admin.student.index',([
            'students'=>$students,
            'province'=>$request->province,
            'collage'=>$request->collage,
            'department'=>$request->department,
            'name'=>$request->name,
            'year'=>$request->year,
        ] ));

    }


    public function getStudents($year,$province,$collage,$department){
        $students =  Student::where('collage_province_id',$province)
        ->where('type',\Auth::user()->type)
        ->where('service',\Auth::user()->service)
        ->where('collage_id',$collage)
        ->where('department_id',$department)
        ->where('graduation_year',$year)
        ->get();
        return response()->json($students);
    }
}
