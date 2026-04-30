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
        Schema::create('master_log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('aktivitas'); // created, updated, deleted, login, logout
            $table->string('model')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->text('data_lama')->nullable();
            $table->text('data_baru')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('master_admin')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_log_aktivitas');
    }
};
