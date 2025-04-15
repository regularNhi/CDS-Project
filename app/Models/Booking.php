<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'user_id',
        'name',
        'email',
        'phone',
        'date',
        'time',
    ];

    public function service()
    {
        return $this->hasOne('App\Models\Service','id','service_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','id','user_id');
    }
}
