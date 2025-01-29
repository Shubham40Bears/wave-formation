<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vcf_profile_data', function (Blueprint $table) {
            $table->string('card_type')->default('active')->change();
        });
        DB::statement("
            ALTER TABLE vcf_profile_data
            MODIFY COLUMN card_type ENUM(
                'business', 'invitation', 'birthday', 'love'
            ) DEFAULT 'business'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vcf_profile_data', function (Blueprint $table) {
            //
        });
    }
};
