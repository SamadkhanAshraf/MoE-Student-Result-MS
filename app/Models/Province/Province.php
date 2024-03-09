<?php

namespace App\Models\Province;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;


class Province extends Model
{
    use HasFactory,Uuids,SoftDeletes;
    protected $fillable =[
        'name_en',
        'name_dr',
        'name_pa',
        'remark',
        'added_by',
        'edited_by',
    ];

    public function districts(){
        return $this->hasMany(District::class);
    }

    public function collages(){
        return $this->hasMany(Collage::class);
    }
}
