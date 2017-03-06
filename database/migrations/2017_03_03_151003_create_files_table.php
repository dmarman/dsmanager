<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soundsystems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('client_name');
            $table->string('name');
            $table->string('type');
            $table->integer('size');
            $table->string('local_storage');
            $table->string('cloud_storage');
            $table->string('path');
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
        //
    }
}