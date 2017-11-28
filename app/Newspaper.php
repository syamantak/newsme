<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    
    protected $fillable = [
        'user', 'name'
    ];
}
