<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'service_id',
        'name',
        'email',
        'phone',
        'message',
        
    ];
}
