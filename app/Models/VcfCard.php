<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VcfCard extends Model
{
    use HasFactory;

    protected $table = 'vcf_cards';

    protected $fillable = [
        'profile_code',
        'card_detail',
        'photo_url',
    ];

    protected $casts = [
        'card_detail' => 'array',
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
