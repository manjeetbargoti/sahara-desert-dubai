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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('type', 191)->nullable();
            $table->bigInteger('category')->unsigned();
            $table->text('name');
            $table->text('subtitle')->nullable();
            $table->text('slug');
            $table->double('original_price',8,2)->nullable();
            $table->double('sell_price',8,2)->nullable();
            $table->double('child_price',8,2)->nullable();
            $table->double('infant_price',8,2)->nullable();
            $table->double('discount',8,2)->nullable();
            $table->string('discount_type')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('tour_inclusion')->nullable();
            $table->longText('what_this_tour')->nullable();
            $table->longText('important_information')->nullable();
            $table->longText('itenarary_description')->nullable();
            $table->longText('useful_information')->nullable();
            $table->longText('faq_details')->nullable();
            $table->longText('terms_condition')->nullable();
            $table->longText('cancellation_policy_name')->nullable();
            $table->longText('cancellation_policy_description')->nullable();
            $table->longText('child_cacellation_policy_name')->nullable();
            $table->longText('child_cacellation_policy_description')->nullable();
            $table->string('thumbnail_img')->nullable();
            $table->text('photos')->nullable();
            $table->string('banner')->nullable();
            $table->string('reporting_time')->nullable();
            $table->string('duration')->nullable();
            $table->string('season')->nullable();
            $table->string('max_guest')->nullable();
            $table->text('departure_point')->nullable();
            $table->string('child_age')->nullable();
            $table->string('infant_age')->nullable();
            $table->string('infant_count')->nullable();
            $table->string('is_slot')->nullable();
            $table->string('only_child')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('google_map')->nullable();
            $table->string('start_time')->nullable();
            $table->text('meal')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->tinyInteger('featured')->default(0)->nullable();
            $table->tinyInteger('admin_approval')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
