<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $table = 'contact_information';
    protected $fillable = ['institute_name','address','mobile_no','phone_no','email_add','email_alternate','tweeter_link','facebook_link','whatsapp_link','location_txt'];
}
