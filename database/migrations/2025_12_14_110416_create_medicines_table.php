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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id(); // Mewakili Medicine_ID
            $table->string('Medicine_Name');
            $table->string('Image')->nullable();
            $table->integer('Price');
            $table->integer('Stock');
            $table->string('Description');

            // Foreign Keys (Menghubungkan ke categories & suppliers)
            // Kita gunakan nama standar _id agar Laravel otomatis paham relasinya
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
