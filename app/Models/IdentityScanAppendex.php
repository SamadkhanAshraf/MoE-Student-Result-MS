<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class IdentityScanAppendex extends Model
{
    use HasFactory,Uuids,SoftDeletes;

    protected $fillable=[
        'identity_scan_id',
        'scan_path',
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
    public function identityScan(){
        return $this->belongsTo(IdentityScan::class,'identity_scan_id','id');
    }
}
