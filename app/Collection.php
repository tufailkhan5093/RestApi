<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable=[
        'collection_date',
        'start_time',
        'end_time',
    ];
}
