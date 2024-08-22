<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'qty_in_stock',
        "category_id",
        'price',
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
