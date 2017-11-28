<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'user', 'customer', 'amount', 'from_date', 'to_date'
    ];
}