<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tees', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enabled')->default(true);
            $table->integer('course_id')->unsigned();
            $table->string('gender');
            $table->integer('teecolor_id')->unsigned();
            $table->double('slope');
            $table->double('rating');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teecolor_id')->references('id')->on('tee_colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tees');
    }
}
