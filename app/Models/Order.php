<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'phonenumber', 
        'address', 
        'user_id', 
        'email', 
        'product_title', 
        'price', 
        'quantity', 
        'image', 
        'product_id', 
        'payment_status', 
        'delivery_status', 
        'order_id',
        'total_price',  
    ];

    public function product()
{
    return $this->belongsToMany(Product::class)->withPivot('quantity');
}


}
