<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Article extends Model
{

    use Searchable;
    
    public function getDate($format)
    {
        $this->created_at = new \DateTime($this->created_at);
        return $this->created_at->format($format);
    }

    public function getExtrait($length = 150)
    {
        return substr($this->content, 0, $length) . "...";
    }
    
    protected $fillable = [
        'title',
        'content',
        'author',
        'thumb_1',
        'thumb_2',
        'updated_by',
    ];
}
