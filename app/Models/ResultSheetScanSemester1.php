<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;


class ResultSheetScanSemester1 extends Model
{
    use HasFactory,Uuids,SoftDeletes;

    protected $fillable=[
        'province_id',
        'collage_id',
        'department_id',
        'scan_path',
        'year',
        'status',
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
        return $this->belongsTo(Province::class,'province_id');
    }

    public function collage(){
        return $this->belongsTo(Collage::class,'collage_id');
    }

    public function department(){
        return $this->belongsTo(Departments::class,'department_id');
    }

    public function students(){
        return $this->belongsToMany(Student::class,'student_result_semester1s','result_sheet_id','student_id');
    }

    public function appendixes(){
        return $this->hasMany(ResultSheetAppendixScanSemester1::class,'result_sheet_id','id');
    }

}
