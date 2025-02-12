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
        Schema::table('vcf_profile_data', function (Blueprint $table) {
            $table->boolean('secret_mode')->default(false);
            $table->string('secret_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vcf_profile_data', function (Blueprint $table) {
            $table->dropColumn(['secret_mode', 'secret_code']);
        });
    }
};
