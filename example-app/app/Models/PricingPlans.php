<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlans extends Model
{
    protected $fillable = ['title', 'price', 'features', 'is_featured'];
protected $casts = [
    'features' => 'array',
    'is_featured' => 'boolean',
];
}
