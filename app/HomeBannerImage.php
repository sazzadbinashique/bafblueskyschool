<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBannerImage extends Model
{
    protected $table = 'home_banner_images';
    protected $fillable = ['title','image'];
}
