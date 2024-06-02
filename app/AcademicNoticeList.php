<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicNoticeList extends Model
{
    protected $table = 'academic_notice_lists';
    protected $fillable = ['name','remarks','sub_cat_id'];
}
