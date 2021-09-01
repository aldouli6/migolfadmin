<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnableToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->boolean('enabled')->default(true);
            
        });
        Schema::table('states', function (Blueprint $table) {
            $table->boolean('enabled')->default(true);
            
        });
        Schema::table('clubs', function (Blueprint $table) {
            $table->boolean('enabled')->default(true);
            
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->boolean('enabled')->default(true);
            
        });
        Schema::table('user_courses', function (Blueprint $table) {
            $table->string('classification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('enabled');
        });
        Schema::table('states', function (Blueprint $table) {
            $table->dropColumn('enabled');
        });
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('enabled');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('enabled');
        });
        Schema::table('user_courses', function (Blueprint $table) {
            $table->dropColumn('classification');
        });
    }
}
