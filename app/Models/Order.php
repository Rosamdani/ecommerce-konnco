<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_number',
        'payment_status',
        'status',
        'notes',
        'grandtotal',
    ];

    // Auto generate unique order number
    public static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            if (!$order->order_number) {
                $order->order_number = self::generateOrderNumber();
            }
        });
    }

    public static function generateOrderNumber()
    {
        $order_number = "ORD-" . strtoupper(Str::random(10));
        if (self::where('order_number', $order_number)->exists()) {
            return self::generateOrderNumber();
        }
        return $order_number;
    }


    public function user(): BelongsTo
    {
        // Return user where hasRole user
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(CustomerAddress::class);
    }
}