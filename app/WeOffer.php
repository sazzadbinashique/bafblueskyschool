<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeOffer extends Model
{
    protected $table = 'we_offers';
    protected $fillable = ['offer_title','image_1','image_2','image_3','image_4','offer_detail'];
}
