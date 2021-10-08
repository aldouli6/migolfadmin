<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetSkinsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet_skins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bet_id')->unsigned();
            $table->boolean('enabled')->default(true);
            $table->double('bet')->nullable();
            $table->text('ventaja')->nullable();
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
        Schema::drop('bet_skins');
    }
}
