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
            $table->string('slug')->unique();                // Unique slug for the product
            $table->decimal('regular_price', 10, 2);         // Regular price
            $table->decimal('sales_price', 10, 2)->nullable(); // Optional sales price
            $table->decimal('price', 10, 2)->nullable();     // Can store a derived price if needed
            $table->unsignedBigInteger('category_id');       // Foreign key for category
            $table->text('images')->nullable();              // Images as a JSON array or comma-separated string
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
