<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount',
        'discount_type',
        'usage_limit',
        'used_count',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];
    public function isExpired(): bool
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    public function isUsable(): bool
    {
        return $this->is_active && !$this->isExpired() && $this->used_count < $this->usage_limit;
    }

    public function useCode(): bool
    {
        if ($this->isUsable()) {
            $this->increment('used_count');
            return true;
        }
        return false;
    }
}
