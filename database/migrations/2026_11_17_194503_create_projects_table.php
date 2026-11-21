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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client')->nullable();             // فاضي = Confidential
            $table->string('location');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('summary', 300);
            $table->text('challenge')->nullable();            // التحدي
            $table->string('role')->nullable();               // دور EIS
            $table->json('technical_delivery')->nullable();   // نقاط التنفيذ الفني
            $table->text('outcome')->nullable();              // النتيجة
            $table->json('highlights')->nullable();           // الأربع نقاط المختصرة
            $table->string('status')->default('completed');
            $table->unsignedSmallInteger('completed_year')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 300)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(false);    // مخفي لحد ما يتعتمد
            $table->timestamps();

            $table->index(['is_active', 'is_featured']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
