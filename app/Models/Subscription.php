<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_plan_id',
        'status',
        'start_date',
        'next_delivery_date',
        'meals_per_week',
        'total_price',
        'cancelled_at',
        'shipping_name',
        'shipping_address',
        'shipping_city',
        'shipping_phone',
    ];

    protected $casts = [
        'start_date' => 'date',
        'next_delivery_date' => 'date',
        'cancelled_at' => 'date',
        'total_price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }
}
