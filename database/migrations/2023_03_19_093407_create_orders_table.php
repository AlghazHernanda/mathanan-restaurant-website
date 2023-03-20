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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email');
            // $table->text('address');
            $table->string('phonenumber');
            $table->json('cart');
            $table->bigInteger('total_price');
            $table->string('status')->default('belum pesan')->nullable();
            $table->string('transaction_id')->nullable(); //nullalble buat coba-coba
            $table->string('payment_type')->nullable(); //nullalble buat coba-coba
            $table->string('payment_code')->nullable();
            $table->string('pdf_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
