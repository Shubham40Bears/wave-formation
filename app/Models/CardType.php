<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CardType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'fields', 'slug'];

    // Cast the 'fields' column to an array
    protected $casts = [
        'fields' => 'array',
    ];
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($cardType) {
            if (empty($cardType->slug)) {
                $cardType->slug = static::generateUniqueSlug($cardType->name);
            }
        });
    }
    /**
     * Generate a unique slug based on the product name.
     *
     * @param string $name
     * @return string
     */
    private static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        // Check if the slug already exists and append a number to make it unique
        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }
}
