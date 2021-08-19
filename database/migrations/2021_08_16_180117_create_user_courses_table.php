<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoursesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('user_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('tee_default_male')->nullable()->unsigned();
            $table->integer('tee_default_female')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('tee_default_male')->references('id')->on('tees');
            $table->foreign('tee_default_female')->references('id')->on('tees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_courses');
    }
}
