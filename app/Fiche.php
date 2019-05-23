<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Fiche extends Model
{

    use Searchable;

    protected $fillable = [
        'name',
        'content',
        'program',
        'date_start',
        'date_end',
        'location',
        'pre_requisite',
        'level',
        'branche_id'
    ];

    public function branche() {
        return $this->belongsTo('App\Branche');
    }
}
