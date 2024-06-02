<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachingstaff extends Model
{
    protected $table = 'teachingstaffs';
    protected $fillable = ['image','name','qualification','designation','branch','mobile_no','email','remarks','appointment_ser_no'];
}
