<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeBoard extends Model
{
    protected $table = 'notice_boards';

    protected $fillable = ['notice_img','notice_publish_dt','notice_admin_name','notice_title','notice_description','notice_pdf'];
}
