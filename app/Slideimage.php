<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slideimage extends Model
{
    //
    protected $table = 'slideimages';
    protected $fillable = ['img_title','slide_img'];
}
