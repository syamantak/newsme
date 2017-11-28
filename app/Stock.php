<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'user', 'newspaper', 'quantity', 'price', 'date', 'sold'
    ];
}