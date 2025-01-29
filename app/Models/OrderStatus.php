<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    // The table associated with the model
    protected $table = 'order_statuses';

    // The attributes that are mass assignable
    protected $fillable = [
        'order_id',
        'status',
        'remarks',
        'status_updated_at',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
