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
        Schema::create('zoom_item_sub_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('account_type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('role')->nullable();
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->string('notes')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_backup')->default(false);
            $table->foreignUuid('zoom_sub_account_id')->references('id')->on('zoom_sub_accounts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('customer_id')->nullable()->constrained()->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_item_sub_accounts');
    }
};
