<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityCategory extends Model
{
    protected $table = 'facility_categories';
    protected $fillable = ['name','remarks'];
}
