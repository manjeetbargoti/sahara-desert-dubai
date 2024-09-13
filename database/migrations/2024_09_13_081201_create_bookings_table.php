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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tour_id');
            $table->string('booking_reference')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('request_page')->nullable();
            $table->double('adult_price', 2)->nullable();
            $table->double('child_price', 2)->nullable();
            $table->double('infant_price', 2)->nullable();
            $table->double('fixed_charges', 2)->nullable();
            $table->string('fixed_charges_type')->nullable();
            $table->date('booking_date')->nullable();
            $table->time('time_slot')->nullable();
            $table->string('adult_count')->nullable();
            $table->string('child_count')->nullable();
            $table->string('infant_count')->nullable();
            $table->double('subtotal', 2)->nullable();
            $table->double('total_vat', 2)->nullable();
            $table->double('grand_total', 2)->nullable();
            $table->bigInteger('vendor_id')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
