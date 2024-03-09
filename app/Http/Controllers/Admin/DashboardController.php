<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class DashboardController extends Controller
{



    public function dashboard(){
        $years=array();
        $students=array();

        $graduatedStudents = Student::orderBy('graduation_year', 'asc')->select(\DB::raw('count(*) as students, graduation_year'))
            ->groupBy('graduation_year')
            ->get();
        // groupBy('graduation_year')->count('id');
        foreach ($graduatedStudents as $key => $graduatedStdunt) {
            array_push($years, $graduatedStdunt->graduation_year);
            array_push($students, $graduatedStdunt->students);
        }

        return view('admin.dashboard',compact(['years','students']));
    }


}
