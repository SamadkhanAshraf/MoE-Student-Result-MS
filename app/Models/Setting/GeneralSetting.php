<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class GeneralSetting extends Model
{
    use HasFactory,Uuids;

    protected $failable=[
        'name',
        'logo',
        'email',
        'email_password',
        'phone',
        'whatsapp',
        'instagram',
        'telegram',
        'linkedin',
        'twitter',
        'youtube',
        'address',
        'google_map',
        'lang',
        'user_id'
    ];

    public function user(){
       return $this->belongsTo('App\Models\User');
    }
}
