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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->string('sri_no1')->nullable();
            $table->string('sri_no2')->nullable();
            $table->string('sri_no3')->nullable();
            $table->json('future_plans')->nullable();
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_district');
            $table->string('mobile_no1');
            $table->string('mobile_no2');
            $table->unsignedBigInteger('main_product_package');
            $table->json('future_product_packages');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->unsignedBigInteger('deliver_id')->nullable();
            $table->string('amount');
            $table->string('attachments1');
            $table->string('attachments2');
            $table->string('attachments3')->nullable();
            $table->string('attachments4')->nullable();
            $table->string('attachments5')->nullable();
            $table->string('account_departmet_checked')->default('unchecked');
            $table->string('deliver_departmet_checked')->default('not printed');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
