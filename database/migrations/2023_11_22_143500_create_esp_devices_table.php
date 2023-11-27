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
        Schema::create('esp_devices', function (Blueprint $table) {
            $table->id();
            $table->macAddress();
            $table->integer('r1')->nullable()->default(null);
            $table->integer('r2')->nullable()->default(null);
            $table->string('SSID', 50)->nullable()->default(null);
            $table->string('SSID_Password', 50)->nullable()->default(null);
            $table->string('API', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esp_devices');
    }
};
