<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ourservice extends Model
{
    protected $table = 'ourservices';
    protected $fillable = ['title','image','ourservice_cat_id','description1','description2','description3'];
}
