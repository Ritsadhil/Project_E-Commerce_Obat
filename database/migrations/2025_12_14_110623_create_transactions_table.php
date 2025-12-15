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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Mewakili transaction_ID

            // Relasi ke User & Cart
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');

            $table->integer('Total_Price');
            $table->string('address');
            $table->enum('Delivery_Status', ['dikemas', 'dikirim', 'diterima']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
