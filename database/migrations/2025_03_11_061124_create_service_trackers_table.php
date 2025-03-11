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
        Schema::create('service_trackers', function (Blueprint $table) {
            $table->id();
            $table->string('service_id')->unique();
            $table->timestamp('way')->nullable();
            $table->timestamp('estimate')->nullable();
            $table->timestamp('progress')->nullable();
            $table->timestamp('check')->nullable();
            $table->timestamp('finish')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_trackers');
    }
};
