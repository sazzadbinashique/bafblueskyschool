<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicNotice extends Model
{
    protected $table = 'academic_notices';
    protected $fillable = ['title','file','academicnotice_cat_id'];
}
