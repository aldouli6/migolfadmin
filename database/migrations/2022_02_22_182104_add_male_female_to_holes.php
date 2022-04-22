<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaleFemaleToHoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('holes', function (Blueprint $table) {
            
            $table->double('hole_raiting_male');
            $table->double('hole_raiting_female');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('holes', function (Blueprint $table) {
            $table->dropColumn('hole_raiting_female');
            $table->dropColumn('hole_raiting_male');
        });
    }
}
