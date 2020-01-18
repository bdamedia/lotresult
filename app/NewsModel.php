<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class NewsModel extends Eloquent
{
    protected $fillable = ['title','content','image','news_slug','meta_title','meta_keywords','meta_description']; //<---- Add this line

    protected $connection = 'mongodb';
    protected $collection = 'lot_news';
}
