<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->boolean('enabled')->default(true);
            $table->string('alias')->nullable()->unique();	
            $table->string('lastname')->nullable();
            $table->char('gender')->nullable();
            $table->integer('country_id')->nullable()->unsigned();
            $table->integer('state_id')->nullable()->unsigned();		
            $table->string('fcm_token', 255)->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('frequency')->nullable();
            $table->integer('field_id')->nullable()->unsigned();
            $table->integer('start_id')->nullable()->unsigned();
            $table->boolean('terms')->default(false);	
            $table->boolean('privacy_notice')->default(false);
        });

        Schema::table('users', function (Blueprint $table) {	
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['country_id']);	
            $table->dropForeign(['state_id']);
            $table->dropForeign(['field_id']);
            $table->dropForeign(['start_id']);
            $table->dropColumn('enabled');	
            $table->dropColumn('alias');	
            $table->dropColumn('lastname');	
            $table->dropColumn('gender');	
            $table->dropColumn('country_id');
            $table->dropColumn('state_id');
            $table->dropColumn('fcm_token');	
            $table->dropColumn('phone');	
            $table->dropColumn('frequency');
            $table->dropColumn('field_id');
            $table->dropColumn('start_id');
            $table->dropColumn('terms');	
            $table->dropColumn('privacy_notice');	
        });
    }
}
