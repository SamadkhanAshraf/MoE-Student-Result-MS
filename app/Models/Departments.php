<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Departments extends Model
{
    use HasFactory,Uuids;
    protected $fillable =[
        'name_en',
        'name_dr',
        'name_pa',
        'remark',
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

    public function collages(){
        return $this->belongsToMany(Collage::class,'collage_departments','collage_id','dep_id');
     }
}
