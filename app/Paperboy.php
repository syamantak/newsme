<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paperboy extends Model
{
    protected $fillable = [
        'user', 'name', 'address', 'mobile'
    ];
}
