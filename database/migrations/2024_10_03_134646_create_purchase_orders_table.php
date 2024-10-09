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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->date('due_date')->nullable();
            $table->date('purchase_order_date')->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->text('spelled_out')->nullable();
            $table->string('message')->nullable();
            $table->string('ppn')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('total')->nullable();
            $table->string('insufficient_payment')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->on('suppliers')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
