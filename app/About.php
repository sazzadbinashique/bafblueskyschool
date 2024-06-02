<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';
    protected $fillable = ['title','image','aboutus_cat_id','description1','description2','description3'];
}
