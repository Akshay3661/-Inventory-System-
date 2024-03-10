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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category')->nullable();
            $table->foreign('category')->references('id')->on('categories')->nullable();
            //$table->string('assign_to');
            $table->string('comment');
            $table->string('assign_to')->nullable();
            $table->string('condition');
            $table->string('quantity');
            $table->string('inventory_no');
            $table->string('brand');
            $table->string('status');
            $table->string('image');
            $table->string('purchase_price');
            $table->string('purchase_date');
            $table->string('warranty')->nullable();
            $table->string('duration')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('company');
            $table->string('owner_name');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
