<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageInfo extends Model
{
    protected $table = 'home_page_infos';
    protected $fillable = ['top_image','bottom_image','description_1','description_2','copyright_tag','developed_by_tag'];
}
