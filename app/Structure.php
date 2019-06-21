<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Commune;

class Structure extends Model
{
    protected $fillable = [
        'name',
        'mail',
        'website', 
        'logo', 
        'phone', 
        'adress', 
        'commune_id'
    ];

    public function commune () {
        return $this->belongsTo('App\Commune');
    }
}