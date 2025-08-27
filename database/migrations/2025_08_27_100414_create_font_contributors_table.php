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
        Schema::create('font_contributors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('font_id')->constrained('fonts')->cascadeOnDelete();
            $table->foreignId('contributor_id')->constrained('contributors')->cascadeOnDelete();
            $table->enum('role', ['designer', 'developer']);
            $table->timestamps();
            $table->unique(['font_id', 'contributor_id', 'role']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('font_contributors');
    }
};
