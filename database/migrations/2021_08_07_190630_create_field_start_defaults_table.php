<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldStartDefaultsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_start_defaults', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('field_id')->unsigned();
            $table->string('gender');
            $table->integer('start_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('field_start_defaults');
    }
}
