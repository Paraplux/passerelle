<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    protected $table = 'contenu';

    protected $fillable = [
        'accueil_thumb',
        'accueil_news_subtitle',
        'accueil_formations_subtitle',
        'formations_thumb',
        'partenaires_text',
        'map_text',
        'contact_text',
        'fb_link',
        'tw_link',
        'li_link',
        'yt_link',
    ];
}
