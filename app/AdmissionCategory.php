<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionCategory extends Model
{
    protected $table = 'admission_categories';
    protected $fillable = ['name','remarks','sub_cat_id'];
}
