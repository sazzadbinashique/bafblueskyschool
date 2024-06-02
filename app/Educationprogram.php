<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educationprogram extends Model
{
    protected $table = 'educationprograms';
    protected $fillable = ['title','image','educationprogram_cat_id','description1','description2','description3'];
}
