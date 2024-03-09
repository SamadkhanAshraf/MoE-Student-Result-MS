<?php

namespace App\Models\Province;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;


class District extends Model
{
    use HasFactory,Uuids,SoftDeletes;
    protected $fillable =[
        'name_en',
        'name_dr',
        'name_pa',
        'remark',
        'province_id',
        'added_by',
        'edited_by',

    ];
    public function province(){
        return $this->belongsTo(Province::class, 'province_id','id');
    }
}
