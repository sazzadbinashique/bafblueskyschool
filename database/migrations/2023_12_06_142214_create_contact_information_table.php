<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->string('institute_name',255)->nullable();
            $table->string('address',255)->nullable();
            $table->longText('location_txt')->nullable();
            $table->string('mobile_no',255)->nullable();
            $table->string('phone_no',255)->nullable();
            $table->string('email_add',255)->nullable();
            $table->string('tweeter_link',255)->nullable();
            $table->string('facebook_link',255)->nullable();
            $table->string('whatsapp_link',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_information');
    }
}
