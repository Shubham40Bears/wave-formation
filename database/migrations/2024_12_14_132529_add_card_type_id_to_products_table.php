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
        Schema::table('products', function (Blueprint $table) {
            Schema::table('products', function (Blueprint $table) {
                $table->unsignedBigInteger('card_type_id')->nullable(); // Foreign key column
                $table->foreign('card_type_id')->references('id')->on('card_types')->onDelete('set null'); // Define foreign key relationship
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['card_type_id']); // Drop foreign key
            $table->dropColumn('card_type_id'); // Drop the column
        });
    }
};
