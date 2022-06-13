<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'tel',
        'address'
    ];

    public function order_S(){
        return $this->hasMany(Order::class, 'sender_id', 'id');
    }
}
