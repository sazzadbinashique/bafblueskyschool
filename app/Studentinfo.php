<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentinfo extends Model
{
    protected $table = 'studentinfos';

    protected $fillable = ['name','student_id','email','class'];
}
