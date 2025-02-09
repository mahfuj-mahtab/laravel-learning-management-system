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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['EMBED','LIVE','UPLOAD'])->default('EMBED');

            $table->string('embed_link')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('order');
            $table->float('duration');
            $table->enum('status', ['ACTIVE','INACTIVE','DRAFT'])->default('INACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
    }
};
