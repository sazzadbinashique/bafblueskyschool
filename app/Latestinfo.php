<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latestinfo extends Model
{
    protected $table = 'latestinfos';

    protected $fillable = ['title','latest_news_doc'];
}
