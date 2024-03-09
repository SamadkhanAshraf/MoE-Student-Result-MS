<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Collage extends Model
{
    use HasFactory,Uuids;
    protected $fillable =[
        'name_en',
        'name_dr',
        'name_pa',
        'remark',
        'province_id',
        'added_by',
        'edited_by',
        'deleted_by',
    ];

    protected $with=['departments'];
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

    public function departments(){
        return $this->belongsToMany(Departments::class,'collage_departments','collage_id','dep_id');
     }
}
