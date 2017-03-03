<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id');
            $table->integer('body_id');
            $table->integer('radio_id');
            $table->integer('sound_system_id');
            $table->integer('hand_id');
            $table->integer('my_id');
            $table->integer('week');
            $table->integer('year');
            $table->integer('amp_id');
            $table->integer('version');
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
        Schema::drop('datasets');
    }
}
