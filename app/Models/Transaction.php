<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'cart_id',
        'Total_Price',
        'address',
        'Delivery_Status'
    ];
}
