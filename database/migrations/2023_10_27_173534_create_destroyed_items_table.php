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
        Schema::create('destroyed_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_item_detail_id');
            $table->foreign('purchase_item_detail_id')->references('id')->on('purchase_item_details');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product_types');
            $table->unsignedBigInteger('create_by');
            $table->foreign('create_by')->references('id')->on('users');
            $table->string('destroyed_by');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destroyed_items');
    }
};
