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
        Schema::create('shop_information', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('division')->nullable();
            $table->string('township')->nullable();
            $table->string('city_and_village')->nullable();
            $table->string('street_and_road')->nullable();
            $table->string('no')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_image')->nullable();
            $table->foreignId('user_id');
            $table->string('applicant_type');
            $table->string('applicant_name')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_information');
    }
};
