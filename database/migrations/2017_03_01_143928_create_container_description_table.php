<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainerDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('container_id');
            $table->integer('car_id');
            $table->integer('body_id');
            $table->integer('radio_id');
            $table->integer('soundsystem_id');
            $table->integer('hand_id');
            $table->integer('week');
            $table->integer('year');
            $table->integer('amplifier_id');
            $table->softDeletes();
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
        Schema::drop('container_description');
    }
}
