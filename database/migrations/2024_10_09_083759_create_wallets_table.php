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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('order_id')->nullable();
            $table->string('tranx_id')->nullable();
            $table->string('tranx_type')->nullable();
            $table->double('tranx_amount', 8, 2)->default('0.00');
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_details')->nullable();
            $table->tinyInteger('approval')->default(0);
            $table->tinyInteger('offline_payment')->default(0);
            $table->string('recipt')->nullable();
            $table->timestamp('expiry_at')->nullable();
            $table->tinyInteger('is_expired')->default(0);
            $table->tinyInteger('deducted')->default(0);
            $table->text('tranx_remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
