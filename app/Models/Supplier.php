<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers'; // Pastikan ini jamak
    protected $fillable = [
        'Supplier_Name',
        'Supplier_Address',
        'contact'
    ];
}
