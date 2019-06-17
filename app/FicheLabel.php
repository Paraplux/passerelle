<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FicheLabel extends Model
{
    protected $table = 'fiche_label';
    
    protected $fillable = [
        'fiche_id',
        'label_id'
    ];
}
