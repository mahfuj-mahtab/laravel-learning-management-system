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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
            $table->integer('order');
            $table->enum('status', ['ACTIVE','INACTIVE','DRAFT'])->default('INACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section');
    }
};
