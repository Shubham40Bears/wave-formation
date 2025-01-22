<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazorpayResponse extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',
        'response_data',
    ];

    protected $casts = [
        'response_data' => 'array', // Cast the JSON response data to an array
    ];

    /**
     * Relationship with the Order model.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
