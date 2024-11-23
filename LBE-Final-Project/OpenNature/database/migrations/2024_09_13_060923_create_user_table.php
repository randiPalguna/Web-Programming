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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user-id')->nullable(false);
            $table->string('user-name', length: 255)->nullable(false);;
            $table->string('user-password', length: 255)->nullable(false);;
            $table->string('user-email', length: 255)->nullable(false);
            $table->unique(['user-id', 'user-email']);
            $table->primary('user-id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
