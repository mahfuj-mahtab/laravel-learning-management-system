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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->text('description');
            $table->string('banner_image');
            $table->enum('type',['LIVE','REGULAR'])->default('REGULAR');
            $table->foreignId('instructor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sub_category_id')->onDelete('cascade');
            $table->decimal('price', 8,2);
            $table->decimal('discount_price', 8,2);
            $table->enum('status',['DRAFT','ACTIVE','INACTIVE'])->default('DRAFT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
