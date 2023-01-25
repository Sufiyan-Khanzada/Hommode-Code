<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'content',
        'short_content',
        'featured_image',
        'author',
        'post_status',
       
    ];
}