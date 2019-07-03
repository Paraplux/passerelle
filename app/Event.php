<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'content',
        'structure_id',
        'date_start',
        'date_end'
    ];

    public function structure() {
        return $this->belongsTo('App\Structure');
    }

    public function getDateStart($format)
    {
        $this->date_start = new \DateTime($this->date_start);
        return $this->date_start->format($format);
    }
    public function getDateEnd($format)
    {
        $this->date_end = new \DateTime($this->date_end);
        return $this->date_end->format($format);
    }

    public function calendarDate() {
        $this->date_start = new \DateTime($this->date_start);
        return $this->date_start->format('m-d-Y');
    }
}
