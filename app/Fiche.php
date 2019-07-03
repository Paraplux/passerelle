<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Branche;
use App\Label;

use Nicolaslopezj\Searchable\SearchableTrait;

class Fiche extends Model
{

    use SearchableTrait;

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'fiches.name' => 10,
            'fiches.content' => 10,
            'fiches.program' => 10,
            'fiches.pre_requisite' => 10,
            'fiches.tools' => 10,
            'fiches.date_start' => 10,
            'fiches.date_end' => 10,
            'fiches.certification' => 10
        ]
    ];

    protected $fillable = [
        'name',
        'content',
        'program',
        'pre_requisite',
        'tools',
        'date_start',
        'date_end',
        'duree',
        'structure_id',
        'certification',
        'secteur_id',
        'keyword_id'
    ];

    public function structure() {
        return $this->belongsTo('App\Structure');
    }

    public function branche() {
        return $this->belongsTo('App\Secteur');
    }

    public function label() {
        return $this->belongsTo('App\Label');
    }

    public function getDate($format)
    {
        $this->created_at = new \DateTime($this->created_at);
        return $this->created_at->format($format);
    }
}
