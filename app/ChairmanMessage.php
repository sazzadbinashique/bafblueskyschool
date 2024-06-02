<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChairmanMessage extends Model
{
    protected $table = 'chairman_messages';
    protected $fillable = ['name','image','description_1','description_2','description_3','conclusion'];
}
