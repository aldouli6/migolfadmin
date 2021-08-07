<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('field_id')->unsigned();
            $table->string('gender');
            $table->boolean('enable')->default(true);
            $table->integer('startcolor_id')->unsigned();
            $table->double('slope');
            $table->double('rating');
            $table->integer('par');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('field_id')->references('id')->on('fields');
            $table->foreign('startcolor_id')->references('id')->on('start_colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('starts');
    }
}
