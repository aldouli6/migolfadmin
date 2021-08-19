<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHandicapIndicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_handicap_indices', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('player_id')->unsigned();
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
        Schema::drop('user_handicap_indices');
    }
}
