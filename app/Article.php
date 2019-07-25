<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Tag;
use App\ArticleTag;
use App\Keyword;
use Nicolaslopezj\Searchable\SearchableTrait;

class Article extends Model
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
            'articles.title' => 20,
            'articles.content' => 10,
            'articles.author' => 10,
            'tags.name' => 20
        ],
        'joins' => [
            'article_tag' => ['articles.id','article_tag.article_id'],
            'tags' => ['article_tag.tag_id','tags.id']
        ],
    ];

    protected $fillable = [
        'title',
        'content',
        'author',
        'thumb_1',
        'thumb_2',
        'keyword_id',
        'updated_by',
    ];
    
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function keyword () {
        return $this->belongsTo('App\Keyword');
    }

    public function getDate($format)
    {
        $this->created_at = new \DateTime($this->created_at);
        return $this->created_at->format($format);
    }

    public function getUpdate($format)
    {
        $this->updated_at = new \DateTime($this->updated_at);
        return $this->updated_at->format($format);
    }

    public function getExtrait($length = 150)
    {
        return substr($this->content, 0, $length) . "...";
    }
    
}
