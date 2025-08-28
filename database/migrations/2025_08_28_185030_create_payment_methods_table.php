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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // bkash, nagad, rocket, upay
            $table->string('display_name'); // bKash, Nagad, Rocket, Upay
            $table->string('account_number');
            $table->string('account_type')->default('personal'); // personal, merchant
            $table->string('icon_class')->nullable(); // CSS class for icon
            $table->string('color_class')->default('bg-gray-100'); // Background color class
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->text('instructions')->nullable(); // Special instructions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
