<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MealKit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'servings',
        'prep_time',
        'price',
        'cuisine_type',
        'image_url',
        'ingredients',
        'instructions',
        'is_available',
        'stock',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'decimal:2',
    ];
}
