<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'category_id',
        'parcel_name',
        'weight',
        'width_height',
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
