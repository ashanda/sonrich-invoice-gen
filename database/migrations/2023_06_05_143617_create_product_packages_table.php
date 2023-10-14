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
        Schema::create('product_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('product_type');
            $table->json('product_items');
            $table->json('quantity');
            $table->bigInteger('amount');
            $table->bigInteger('tax');
            $table->bigInteger('discount');
            $table->bigInteger('deliver_fee');
            $table->Integer('package_visibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_packages');
    }
};
