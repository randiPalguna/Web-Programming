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
        Schema::create('plants', function (Blueprint $table) {
            $table->integer('plant-id')->nullable(false);
            $table->string('plant-name', length: 255)->nullable(false);
            $table->string('plant-image', length: 255)->nullable(false);
            $table->integer('plant-price')->nullable(false);
            $table->unique('plant-id');
            $table->primary('plant-id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
