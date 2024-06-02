<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonteachingstaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonteachingstaffs', function (Blueprint $table) {
            $table->id();
            $table->string('name',500);
            $table->string('qualification',255);
            $table->string('designation',255);
            $table->string('branch',255)->nullable();
            $table->string('mobile_no',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('image',255)->nullable();
            $table->string('remarks',1000)->nullable();
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
        Schema::dropIfExists('nonteachingstaffs');
    }
}
