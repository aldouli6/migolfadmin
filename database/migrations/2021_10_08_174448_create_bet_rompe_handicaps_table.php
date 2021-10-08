<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetRompeHandicapsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet_rompe_handicaps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bet_id')->unsigned();
            $table->boolean('enabled')->default(true);
            $table->double('bet1_9')->nullable();
            $table->double('bet10_18')->nullable();
            $table->double('bet_total')->nullable();
            $table->text('opcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('bet_id')->references('id')->on('bets')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bet_rompe_handicaps');
    }
}
