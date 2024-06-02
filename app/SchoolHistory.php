<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolHistory extends Model
{
    protected $table = 'school_histories';
    protected $fillable = ['aboutus_title','image_1','image_2','image_3','image_4','aboutus_detail'];

}
