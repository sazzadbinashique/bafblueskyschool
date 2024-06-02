<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisionMissionAim extends Model
{
    protected $table = 'vision_mission_aims';
    protected $fillable = ['vision_txt','mission_txt','aim_txt'];
}
