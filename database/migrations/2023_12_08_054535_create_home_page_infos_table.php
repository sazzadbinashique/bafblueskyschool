<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_infos', function (Blueprint $table) {
            $table->id();
            $table->string('top_image');
            $table->string('bottom_image');
            $table->longText('description_1')->nullable();
            $table->longText('description_2')->nullable();
            $table->string('copyright_tag')->nullable();
            $table->string('developed_by_tag')->nullable();
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
        Schema::dropIfExists('home_page_infos');
    }
}
