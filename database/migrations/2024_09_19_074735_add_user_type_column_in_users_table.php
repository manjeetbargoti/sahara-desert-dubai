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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('referred_by')->nullable()->after('id');
            $table->bigInteger('provider_id')->nullable()->after('referred_by');
            $table->bigInteger('role_id')->nullable()->after('provider_id');
            $table->string('user_type')->nullable()->after('role_id');
            $table->string('phone_country_code')->nullable()->after('email');
            $table->string('phone')->nullable()->after('phone_country_code');
            $table->timestamp('phone_verified_at')->nullable()->after('email_verified_at');
            $table->string('email_verification_code')->nullable()->after('phone_verified_at');
            $table->string('phone_verification_code')->nullable()->after('email_verification_code');
            $table->string('avatar')->nullable()->after('password');
            $table->string('address')->nullable()->after('avatar');
            $table->string('country')->nullable()->after('address');
            $table->string('state')->nullable()->after('country');
            $table->string('city')->nullable()->after('state');
            $table->string('postal_code')->nullable()->after('city');
            $table->tinyInteger('ban')->default(0)->nullable()->after('postal_code');
            $table->tinyInteger('status')->default(0)->nullable()->after('ban');
            $table->string('referrel_code')->nullable()->after('status');
            $table->string('sdd_points')->nullable()->after('referrel_code');
            $table->double('balance', 2)->nullable()->after('sdd_points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
