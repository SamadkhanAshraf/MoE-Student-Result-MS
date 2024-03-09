<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use HasFactory,Uuids,SoftDeletes;

    protected $fillable=[
        'name',
        'father_name',
        'serial_no',
        'nic_no',
        'collage_province_id',
        'collage_id',
        'department_id',
        'identity_scan_id',
        'entery_year',

        'graduation_year',
        'current_province_id',
        'current_district_id',
        'current_village',
        'real_province_id',
        'real_district_id',
        'real_village',
        'high_school',
        'high_school_graduation_year',

        'type',
        'service',
        'added_by',
        'edited_by',
        'deleted_by',
        'remark'
    ];


    public function addedBy (){
        return $this->belongsTo(User::class,'added_by','id');
    }

    public function editedBy (){
        return $this->belongsTo(User::class,'edited_by','id');
    }
    public function deletedBy (){
        return $this->belongsTo(User::class,'deleted_by','id');
    }

    public function province(){
        return $this->belongsTo(\App\Models\Province\Province::class,'collage_province_id');
    }

    public function collage(){
        return $this->belongsTo(Collage::class,'collage_id');
    }

    public function department(){
        return $this->belongsTo(departments::class,'department_id');
    }

    public function identityScan(){
        return $this->belongsTo(IdentityScan::class,'identity_scan_id');

    }

    public function resultSheetScanSemester1(){
        return $this->belongsToMany(ResultSheetScanSemester1::class,'student_result_semester1s','student_id','result_sheet_id');
    }

    public function resultSheetScanSemester2(){
        return $this->belongsToMany(ResultSheetScanSemester2::class,'student_result_semester2s','student_id','result_sheet_id');
    }

    public function resultSheetScanSemester3(){
        return $this->belongsToMany(ResultSheetScanSemester3::class,'student_result_semester3s','student_id','result_sheet_id');
    }

    public function resultSheetScanSemester4(){
        return $this->belongsToMany(ResultSheetScanSemester4::class,'student_result_semester4s','student_id','result_sheet_id');
    }
}

