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

            $table->string('order_id')->unique();
            // $table->foreignId('customer_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->nullable();
            // $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable();
            $table->enum('status', [
                'pending',
                'processing',
                'shipped',
                'delivered',
                'cancelled',
                'refunded'
            ])->default('pending');

            $table->string('coupon_code')->nullable();
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2);

            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_fee', 10, 2)->default(0);

            $table->string('payment_method');
            $table->enum('payment_status', [
                'pending',
                'processing',
                'complete'
            ])->default('pending');

            $table->text('order_notes')->nullable();
            $table->text('user_note')->nullable();

            $table->integer('notification')->default(1);

            $table->timestamps();
            // $table->softDeletes(); // Uncomment if needed

            $table->index('user_id');
            $table->index('status');
            $table->index('payment_status');
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
