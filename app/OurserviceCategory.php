<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurserviceCategory extends Model
{
    protected $table = 'ourservice_categories';
    protected $fillable = ['name','remarks'];
}
