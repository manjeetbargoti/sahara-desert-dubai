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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('type')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->tinyInteger('verification_status')->nullable();
            $table->longText('verification_info')->nullable();
            $table->double('balance', 2)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_acc_name')->nullable();
            $table->string('bank_acc_number')->nullable();
            $table->string('iban_number')->nullable();
            $table->string('bank_routing_number')->nullable();
            $table->string('bank_payment_status')->nullable();
            $table->tinyInteger('has_trn')->nullable();
            $table->string('trn')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('country')->nullable();
            $table->bigInteger('state')->nullable();
            $table->bigInteger('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->double('percent_commission', 2)->nullable();
            $table->double('fixed_commission', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
