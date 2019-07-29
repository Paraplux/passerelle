<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engagement extends Model
{
    protected $fillable = [
        'intro',
        'outro'
    ];
}
