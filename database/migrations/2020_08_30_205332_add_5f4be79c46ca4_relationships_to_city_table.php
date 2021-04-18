<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5f4be79c46ca4RelationshipsToCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function(Blueprint $table) {
            if (!Schema::hasColumn('cities', 'state_id')) {
                $table->integer('state_id')->unsigned()->nullable();
                $table->foreign('state_id', '50162_5f4be79b5061c')->references('id')->on('states')->onDelete('cascade');
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
        Schema::table('cities', function(Blueprint $table) {
            
        });
    }
}
