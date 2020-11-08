<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'brand_id',
        'short_description',
        'long_description',
        'price',
        'image',
        'size',
        'color',
        'publication_status',
    ];
}
