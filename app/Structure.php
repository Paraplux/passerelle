<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = [
        'name',
        'mail',
        'website', 
        'logo', 
        'phone', 
        'adress', 
        'city'
    ];
}