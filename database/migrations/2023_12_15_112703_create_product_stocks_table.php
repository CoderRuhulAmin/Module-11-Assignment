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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();

            $table->string("batch_no");

            $table->foreignId('product_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->string("stock_qty");

            $table->string("unit_cost");
            $table->string("unit_price");

            $table->string("total_cost");
            $table->string("total_price");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
