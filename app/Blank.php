<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blank extends Model
{
    protected $fillable = [
        'user', 'customer', 'newspaper', 'date'
    ];
}