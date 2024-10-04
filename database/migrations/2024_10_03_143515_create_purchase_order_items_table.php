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
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('qty')->nullable();
            $table->string('satuan')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('vat')->nullable();
            $table->string('vat_price')->nullable();
            $table->string('amount')->nullable();
            $table->unsignedBigInteger('purchase_order_id')->nullable();
            $table->foreign('purchase_order_id')->on('purchase_orders')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_items');
    }
};
