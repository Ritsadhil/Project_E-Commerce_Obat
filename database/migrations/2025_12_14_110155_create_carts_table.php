<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // user pemilik keranjang
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // produk (medicine)
            $table->foreignId('medicine_id')
                ->constrained()
                ->cascadeOnDelete();

            // jumlah
            $table->integer('quantity')->default(1);

            // 🔥 PENTING: cegah produk dobel per user
            $table->unique(['user_id', 'medicine_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
