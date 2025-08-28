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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('font_id')->constrained()->onDelete('cascade');
            
            // Customer information
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->text('note')->nullable();
            
            // Payment information
            $table->string('payment_method'); // bkash, nagad, rocket, etc.
            $table->string('transaction_id');
            $table->string('payment_screenshot')->nullable();
            $table->decimal('amount', 10, 2);
            
            // Order status
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
