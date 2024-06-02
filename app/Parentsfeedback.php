<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentsfeedback extends Model
{
    protected $table = 'parentsfeedbacks';

    protected $fillable = ['email','subject','comments','gen_reply','created_by'];
}
