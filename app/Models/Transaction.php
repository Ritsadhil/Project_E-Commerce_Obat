<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_date',
        'total_price',
        'shipping_address',
        'status', // 'unpaid', 'paid', 'shipping', 'completed', 'cancelled'
    ];

    /**
     * Relasi: Transaksi ini milik user siapa?
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Transaksi ini punya rincian barang apa saja?
     */
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
