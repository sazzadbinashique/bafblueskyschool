<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ourfacilit extends Model
{
    protected $table = 'ourfacilits';
    protected $fillable = ['title','image','description'];
}
