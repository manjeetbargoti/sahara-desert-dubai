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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type')->nullable();
            $table->bigInteger('booking_id')->nullable();
            $table->string('booking_reference')->nullable();
            $table->string('tranx_id')->nullable();
            $table->double('amount', 2)->nullable();
            $table->string('payment_status')->nullable();
            $table->string('tranx_status')->nullable();
            $table->string('payment_details')->nullable();
            $table->string('payment_method')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
