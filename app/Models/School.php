<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory,Uuids,SoftDeletes;
    protected $fillable =[
        'name_en',
        'name_dr',
        'name_pa',
        'remark',
        'province_id',
        'district_id',
        'added_by',
        'edited_by',
        'deleted_by',
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

    public function province (){
        return $this->belongsTo('\App\Models\Province\Province','province_id','id');
    }

    public function district (){
        return $this->belongsTo('\App\Models\Province\District','district_id','id');
    }
}
