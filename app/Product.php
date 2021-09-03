<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name',
        'price',
        'max_price',
        'discount_price',
        'description',
        'keywords',
        'meta_description',
        'image',
        'category',
    ];

}
