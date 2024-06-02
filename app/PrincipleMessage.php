<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrincipleMessage extends Model
{
    protected $table = 'principle_messages';
    protected $fillable = ['name','image','description_1','description_2','description_3','conclusion'];
}
