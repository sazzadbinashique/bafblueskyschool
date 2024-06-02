<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nonteachingstaff extends Model
{
    protected $table = 'nonteachingstaffs';


    protected $fillable = ['image','name','qualification','designation','branch','mobile_no','email','remarks'];

}
