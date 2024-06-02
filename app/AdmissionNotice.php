<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionNotice extends Model
{
    protected $table = 'admission_notices';
    protected $fillable = ['title','file','sub_cat_id'];
}
