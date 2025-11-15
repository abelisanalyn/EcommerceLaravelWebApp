<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'cartable_type', 'cartable_id', 'quantity', 'price', 'customizations'];

    protected $casts = [
        'customizations' => 'json',
        'price' => 'decimal:2',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function cartable()
    {
        return $this->morphTo();
    }
}
