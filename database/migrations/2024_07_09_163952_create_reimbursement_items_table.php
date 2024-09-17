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
        Schema::create('reimbursement_items', function (Blueprint $table) {
            $table->id();
            $table->date('reimbursement_date');
            $table->text('description')->nullable();
            $table->string('tag_po')->nullable();
            $table->bigInteger('amount')->default(0);
            $table->string('receipt')->nullable();
            $table->string('status')->default('Pending');
            $table->foreignUuid('reimbursement_id')->references('id')->on('reimbursement_requests');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->on('companies')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('checked_by')->nullable();
            $table->foreign('checked_by')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reimbursement_items');
    }
};
