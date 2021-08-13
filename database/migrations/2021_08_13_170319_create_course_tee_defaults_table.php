<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTeeDefaultsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_tee_defaults', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->string('gender');
            $table->integer('tee_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('course_id')->references('id')->on('courses');
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
        Schema::drop('course_tee_defaults');
    }
}
