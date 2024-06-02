<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsefulLinks extends Model
{
    protected $table = 'useful_links';
    protected $fillable = ['link_name','link_address'];
}
