<?php

namespace App\Models\Localization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use Uuids,HasFactory, Notifiable;
    protected $fillable = [
        'key_name',
        'english',
        'pashto',
        'dari',
    ];
}
