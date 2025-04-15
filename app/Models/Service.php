<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_title',
        'category',
        'price',
        'discount',
        'description',
        'image',
        'cat_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

}
