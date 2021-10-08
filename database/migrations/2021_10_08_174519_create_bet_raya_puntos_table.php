<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetRayaPuntosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet_raya_puntos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bet_id')->unsigned();
            $table->boolean('enabled')->default(true);
            $table->double('bet')->nullable();
            $table->double('birdie')->nullable();
            $table->double('aguila')->nullable();
            $table->double('albatros')->nullable();
            $table->double('hoyo_uno')->nullable();
            $table->double('exceso')->nullable();
            $table->text('mas_golpes')->nullable();
            $table->text('label1')->nullable();
            $table->double('value1')->nullable();
            $table->text('label2')->nullable();
            $table->double('value2')->nullable();
            $table->text('label3')->nullable();
            $table->double('value3')->nullable();
            $table->text('label4')->nullable();
            $table->double('value4')->nullable();
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
        Schema::drop('bet_raya_puntos');
    }
}
