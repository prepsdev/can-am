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
        Schema::create('service_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('oli_mesin')->nullable();
            $table->string('oli_gardan')->nullable();
            $table->string('oli_gear_box')->nullable();
            $table->string('break_cleaner')->nullable();
            $table->string('carbu_cleaner')->nullable();
            $table->string('crush_washer')->nullable();
            $table->string('busi')->nullable();
            $table->string('o_ring_filter')->nullable();
            $table->string('filter_oli')->nullable();
            $table->longText('information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_details');
    }
};
