<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'mrp',
        'price',
        'qty',
        'length',
        'breadth',
        'height',
        'weight',
        'product_id',
        'color_id',
        'size_id'
    ];
}
