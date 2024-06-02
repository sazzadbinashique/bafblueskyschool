<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    
    protected $fillable = ['event_title', 'event_publish_dt', 'event_time','event_description','location'];
}
