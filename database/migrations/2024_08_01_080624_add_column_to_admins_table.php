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
        Schema::table('admins', function (Blueprint $table) {
            $table->bigInteger('role_id')->after('name');
            $table->string('phone_country_code')->nullable()->after('email');
            $table->string('phone')->nullable()->after('phone_country_code');
            $table->timestamp('phone_verified_at')->nullable()->after('phone');
            $table->tinyInteger('status')->after('password');
            $table->tinyInteger('banned')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            //
        });
    }
};
