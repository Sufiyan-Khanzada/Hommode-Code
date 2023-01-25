<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short-description',
        'long-description',
        'normal-price',
        'sale-price',
        'category',
        'sub-category',
        'sku code',
        'color',
        'size',
        'how_to_use',
        'stock_available',
        'image',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'image7',
        'image8',
        'image9',
        'reviews',
            
  ];
}
