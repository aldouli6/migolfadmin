<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserScoresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('player_id')->unsigned();
            $table->string('hole_raiting_type')->default('NIGUNA');
            $table->string('hole_raitinig')->nullable();
            $table->date('date_hole_raiting')->nullable();
            $table->double('handicap_index')->nullable();
            $table->date('date_handicap_index')->nullable();
            $table->double('ghin')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('player_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_scores');
    }
}
