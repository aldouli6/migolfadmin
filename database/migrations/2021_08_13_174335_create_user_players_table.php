<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlayersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_players', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('player_id')->unsigned();
            $table->string('frequency')->default('USER');
            $table->integer('course_id')->unsigned();
            $table->integer('tee_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('player_id')->references('id')->on('users');
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
        Schema::drop('user_players');
    }
}
