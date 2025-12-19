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
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Obat');
            $table->string('Gambar')->nullable(); // Gambar biasanya nullable jika belum ada
            $table->integer('Harga');
            $table->integer('Stok');
            $table->string('Deskripsi');
            $table->text('Dosis');
            $table->text('Peringatan');

            // Foreign Keys
            $table->foreignId('Kategori_ID')->constrained('kategoris', 'Kategori_ID')->onDelete('cascade');
            $table->foreignId('Supplier_ID')->constrained('suppliers', 'Supplier_ID')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
