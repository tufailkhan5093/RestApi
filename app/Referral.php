<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable=[
        'referral_code',
        'value',
        'expire',
    ];
}
