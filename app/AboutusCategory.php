<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutusCategory extends Model
{
    protected $table = 'aboutus_categories';
    protected $fillable = ['name','remarks'];
}
