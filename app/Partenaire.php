<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
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
