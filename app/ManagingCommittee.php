<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagingCommittee extends Model
{
    protected $table = 'managingcommittee';
    protected $fillable = ['name','designation','image','appointment_ser_no'];
}
