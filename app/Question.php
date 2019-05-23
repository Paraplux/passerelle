<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'more',
        'mail', 
        'pseudo'
    ];

    public function reponses() {
        $this->hasMany('App\Reponse');
    }
}
