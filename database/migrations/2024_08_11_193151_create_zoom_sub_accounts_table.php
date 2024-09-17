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
        Schema::create('zoom_sub_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('account_name');
            $table->string('account_owner');
            $table->string('account_number')->nullable();
            $table->string('total_license')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('activ_email')->nullable();
            $table->string('dealreg_id')->nullable();
            $table->string('dealreg_info')->nullable();
            $table->boolean('is_active')->default(false);
            $table->unsignedBigInteger('zoom_product_type_id')->nullable();
            $table->foreign('zoom_product_type_id')->on('zoom_product_types')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_sub_accounts');
    }
};
