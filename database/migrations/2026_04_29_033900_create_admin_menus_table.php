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
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('admin_menus')->onDelete('cascade');
            $table->enum('type', ['header', 'menu'])->default('menu'); // 'header' for group label, 'menu' for actual link/dropdown
            $table->string('title');
            $table->string('url')->nullable(); // route or path
            $table->string('icon')->nullable(); // e.g. 'bi bi-speedometer2'
            $table->integer('order')->default(0);
            $table->json('roles_allowed')->nullable(); // e.g. ["superadmin", "admin"]
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_menus');
    }
};
