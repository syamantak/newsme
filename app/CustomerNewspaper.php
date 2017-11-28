<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerNewspaper extends Model
{
    protected $fillable = [
        'user', 'customer', 'newspaper'
    ];
}
