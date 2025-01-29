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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Unique promo code
            $table->decimal('discount', 8, 2)->nullable(); // Discount amount
            $table->enum('discount_type', ['percentage', 'fixed'])->default('fixed'); // Type of discount
            $table->integer('usage_limit')->default(1); // How many times can it be used?
            $table->integer('used_count')->default(0); // Times used
            $table->timestamp('expires_at')->nullable(); // Expiration date
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
