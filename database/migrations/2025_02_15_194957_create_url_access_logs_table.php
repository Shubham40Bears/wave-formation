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
        Schema::create('url_access_logs', function (Blueprint $table) {
            $table->id();
            $table->string('url'); // Stores the accessed URL
            $table->ipAddress('ip_address'); // Stores the visitor's IP address
            $table->unsignedBigInteger('vcf_profile_data_id'); // Reference to vcf_profile_data
            $table->integer('access_count')->default(1); // Counts the number of times accessed
            $table->timestamps();

            // Foreign key constraint (ensure vcf_profile_data table exists)
            $table->foreign('vcf_profile_data_id')->references('id')->on('vcf_profile_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_access_logs');
    }
};
