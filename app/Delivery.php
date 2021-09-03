<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable=[
        
        'delivery_date',
        'start_time',
        'end_time',
    ];
}
