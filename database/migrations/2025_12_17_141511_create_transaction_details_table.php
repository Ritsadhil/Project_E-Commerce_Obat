<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();

            // Terhubung ke Transaksi mana?
            $table->foreignId('transaction_id')->constrained()->cascadeOnDelete();

            // Obat apa yang dibeli?
            $table->foreignId('medicine_id')->constrained()->cascadeOnDelete();

            $table->integer('quantity'); // Jumlah beli
            $table->integer('price');    // Harga saat dibeli (Penting! Agar kalau harga obat naik, riwayat tetap harga lama)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
