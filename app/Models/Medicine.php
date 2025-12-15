<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines';
    protected $fillable = [
        'Medicine_Name',
        'Image',
        'Price',
        'Stock',
        'Description',
        'category_id',
        'supplier_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
