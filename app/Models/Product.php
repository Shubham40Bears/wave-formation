<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'regular_price',
        'sales_price',
        'price',
        'category_id',
        'images',
        'description',
        'stock',
        'card_type_id',
        'card_skeleton',
        'choice_images'
    ];
    protected $casts = [
        'images' => 'array',
        'choice_images' => 'array',
    ];

    /**
     * Automatically generate a unique slug from the name before saving.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if (empty($product->slug)) {
                $product->slug = static::generateUniqueSlug($product->name);
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

    /**
     * Get the category that the product belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Accessor to get the price (falling back to regular_price if sales_price is null).
     */
    public function getPriceAttribute()
    {
        return $this->sales_price ?? $this->regular_price;
    }
    public function cardType()
    {
        return $this->belongsTo(CardType::class, 'card_type_id');
    }
}
