<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reponse;

class Question extends Model
{
    protected $fillable = [
        'question',
        'more',
        'mail', 
        'pseudo'
    ];

    public function reponses() {
        return $this->hasMany('App\Reponse');
    }
}
