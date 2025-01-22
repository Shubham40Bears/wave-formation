<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vcf_profile_data', function (Blueprint $table) {
            $table->id();
            $table->uuid('profile_code')->default(Str::uuid());
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('company_name')->nullable();
            $table->string('profile_description')->nullable();
            $table->json('sns_links');
            $table->json('gallery')->nullable();
            $table->string('contact_number');
            $table->enum('card_type',['business','love','invitation'])->default('business');
            $table->enum('status',['active','inactive','disabled'])->default('inactive');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vcf');
            $table->string('photo_url')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
