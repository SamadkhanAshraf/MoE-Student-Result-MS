<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentResultSemester4 extends Model
{
    use HasFactory,Uuids,SoftDeletes;

    protected $fillable=[
        'result_sheet_id',
        'student_id',
    ];

}
