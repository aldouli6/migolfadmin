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
            $table->integer('field_id')->unsigned();
            $table->integer('start_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('player_id')->references('id')->on('users');
            $table->foreign('field_id')->references('id')->on('fields');
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
        Schema::drop('user_players');
    }
}
