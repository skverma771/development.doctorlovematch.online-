<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5f4e9b7031c33RelationshipsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            if (!Schema::hasColumn('users', 'country_id')) {
                $table->integer('country_id')->unsigned()->nullable();
                $table->foreign('country_id', '49806_5f4e9b6f22424')->references('id')->on('countries')->onDelete('cascade');
                }
                if (!Schema::hasColumn('users', 'state_id')) {
                $table->integer('state_id')->unsigned()->nullable();
                $table->foreign('state_id', '49806_5f4e9b6f2efac')->references('id')->on('states')->onDelete('cascade');
                }
                if (!Schema::hasColumn('users', 'city_id')) {
                $table->integer('city_id')->unsigned()->nullable();
                $table->foreign('city_id', '49806_5f4e9b6f3b83e')->references('id')->on('cities')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            
        });
    }
}
