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
            $table->integer('tee_id')->unsigned();
            $table->integer('par');
            $table->double('hole_raiting');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tee_id')->references('id')->on('tees');
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
