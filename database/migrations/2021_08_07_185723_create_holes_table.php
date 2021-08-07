<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hole_number');
            $table->integer('start_id')->unsigned();
            $table->integer('par');
            $table->integer('lead');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('start_id')->references('id')->on('starts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('holes');
    }
}
