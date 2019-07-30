<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = [
        'reponse',
        'mail',
        'pseudo',
        'question_id',
        'thumbs_up',
        'thumbs_down'
    ];

    public function question() {
        return $this->belongsTo('App\Question');
    }
}
