<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'surname',
        'tel',
        'address'
    ];

    public function order_R(){
        return $this->hasMany(Order::class, 'recipient_id', 'id');
    }
}
