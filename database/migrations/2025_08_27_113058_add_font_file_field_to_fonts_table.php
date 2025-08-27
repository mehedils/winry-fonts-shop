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
        Schema::table('fonts', function (Blueprint $table) {
            $table->string('font_file_path')->nullable()->after('file_path')->comment('Font file for frontend use (TTF/OTF)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fonts', function (Blueprint $table) {
            $table->dropColumn('font_file_path');
        });
    }
};
