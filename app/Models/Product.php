<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category', 'description', 'price', 'original_price',
        'color', 'color_start', 'color_end', 'flavor', 'size',
        'rating', 'reviews', 'specs',
        'image', 'images', 'stock', 'is_featured', 'is_new', 'is_sale', 'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_new'      => 'boolean',
        'is_sale'     => 'boolean',
        'is_active'   => 'boolean',
        'price'       => 'float',
        'original_price' => 'float',
        'specs'       => 'array',
        'images'      => 'array',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }
}
