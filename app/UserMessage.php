<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $table = 'user_messages';
    protected $fillable = ['firstname','lastname','email','subject','message'];
}
