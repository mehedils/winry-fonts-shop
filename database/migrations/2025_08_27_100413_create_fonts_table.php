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
        Schema::create('fonts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('published_date')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->unsignedInteger('glyphs')->default(0);
            $table->string('supported_encodings')->nullable(); // e.g., "Unicode, ASCII"
            $table->boolean('is_variable')->default(false);
            $table->text('features')->nullable(); // comma-separated features
            $table->string('file_path')->nullable(); // uploaded file path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonts');
    }
};
