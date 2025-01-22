<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VcfProfileData extends Model
{
    use HasFactory;
    // protected $table = 'vcf_cards';

    protected $fillable = [
        'profile_code',         // UUID for the profile
        'first_name',           // First name
        'last_name',            // Last name
        'designation',          // Job title or role
        'company_name',         // Name of the company
        'profile_description',  // Short profile description
        'sns_links',            // JSON field for social links
        'gallery',              // JSON field for gallery items
        'contact_number',       // Contact number
        'card_type',            // Type of card (business, love, etc.)
        'status',               // Status of the card (active, inactive, etc.)
        'user_id',              // Foreign key for the user
        'vcf',                  // ID of the VCF file
        'photo_url',            // URL of the profile photo
    ];

    protected $casts = [
        'sns_links' => 'array', // Automatically cast sns_links JSON into an array
        'gallery' => 'array',   // Automatically cast gallery JSON into an array
    ];

     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->profile_code)) {
                $model->profile_code = (string) Str::uuid();
            }
        });
    }
}
