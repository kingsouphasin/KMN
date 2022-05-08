<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'recipient_id',
        'original_branch',
        'destination_branch',
        'order_date',
        'order_month',
        'order_year',
        'status',
        'confirmed_date',
        'processing_date',
        'arrived_date',
        'picked_date'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function recipient(){
        return $this->belongsTo(Recipient::class, 'recipient_id', 'id');
    }

    public function destination(){
        return $this->belongsTo(Branch::class, 'destination_branch', 'id');
    }

    public function original(){
        return $this->belongsTo(Branch::class, 'original_branch', 'id');
    }
    public function item(){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
