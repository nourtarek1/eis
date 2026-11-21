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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // جزء الرابط، فريد
            $table->string('summary', 300);
            $table->text('description')->nullable();
            $table->json('capabilities')->nullable(); // القدرات الفنية
            $table->string('icon')->nullable();
            $table->string('meta_title')->nullable(); // SEO
            $table->string('meta_description', 300)->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
