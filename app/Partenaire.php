<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Commune;

class Partenaire extends Model
{
    protected $fillable = [
        'name',
        'mail',
        'website', 
        'logo', 
        'phone', 
        'adress', 
        'commune_id',
        'type'
    ];

    public function commune () {
        return $this->belongsTo('App\Commune');
    }
}
