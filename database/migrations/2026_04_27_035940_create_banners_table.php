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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image_path', 255);
            $table->string('title_id', 255);
            $table->string('title_en', 255);
            $table->string('subtitle_id', 255);
            $table->string('subtitle_en', 255);
            $table->string('link', 255)->default('https://indracostore.com/');
            $table->string('button_text_id', 50)->default('beli sekarang');
            $table->string('button_text_en', 50)->default('buy now');
            $table->integer('order_num')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('schedule_days', 50)->default('1,2,3,4,5,6,7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
