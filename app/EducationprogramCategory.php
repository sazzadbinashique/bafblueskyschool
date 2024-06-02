<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationprogramCategory extends Model
{
    protected $table = 'educationprogram_categories';
    protected $fillable = ['name','remarks'];
}
