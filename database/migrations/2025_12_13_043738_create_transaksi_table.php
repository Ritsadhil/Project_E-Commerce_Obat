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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_ID')->constrained('users', 'Users_ID')->onDelete('cascade'); // Di ERD tertulis User_ID (bukan Users_ID), sesuaikan jika typo
            $table->integer('Total_Harga');
            $table->string('Alamat_Pengiriman');
            $table->enum('Status_pengiriman', ['dikemas', 'dikirim', 'diterima']);

            // Relasi ke Keranjang
            $table->foreignId('Keranjang_ID')->constrained('keranjangs', 'Keranjang_ID')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
