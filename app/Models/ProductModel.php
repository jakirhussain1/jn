<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $fillable = [
        'product_image',
        'product_name',
        'product_price',
        'product_quantity',
        'quantity_alerts',
        'product_details',
        'category_id'
    ];
}
