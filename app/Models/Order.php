<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'order_data',
        'status',
        'amount',
        'address_id'
    ];
    protected $casts = [
        'order_data' => 'array', // Automatically cast JSON to array
    ];
    // Define the possible values for the 'status' enum
    const STATUS_PROCESSING = 'processing';
    const STATUS_PACKED = 'packed';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERY = 'outfordelivery';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    /**
     * Generate a unique order ID in the format TCW-[YYYYMMDD]-[SerialNumber].
     *
     * @return string
     */

     protected static function booted() {
        static::updated(function (Order $order) {
            if ($order->isDirty('status')) {
                // Call your controller method here
                app(\App\Http\Controllers\OrderController::class)->updateOrderStatus($order, $order->status);
            }
        });
    }
    public static function generateOrderId()
    {
        $prefix = 'TCW';
        $date = now()->format('Ymd');
        $lastOrder = self::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->first();
        $serialNumber = $lastOrder ? (int)substr($lastOrder->order_id, -4) + 1 : 1;

        return $prefix . '-' . $date . '-' . str_pad($serialNumber, 4, '0', STR_PAD_LEFT);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Define relationship with the Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * Set the order status.
     *
     * @param  string  $value
     * @return void
     */
    public function setStatusAttribute($value)
    {
        // Ensure the status is one of the predefined enum values
        if (!in_array($value, [self::STATUS_PROCESSING, self::STATUS_PACKED, self::STATUS_FAILED, self::STATUS_DELIVERY, self::STATUS_CANCELLED, self::STATUS_SHIPPED])) {
            throw new \InvalidArgumentException("Invalid status value.");
        }
        $this->attributes['status'] = $value;
    }
    public function payments()
    {
        return $this->hasMany(RazorpayResponse::class);
    }
    public function statuses()
    {
        return $this->hasMany(OrderStatus::class);
    }

}
