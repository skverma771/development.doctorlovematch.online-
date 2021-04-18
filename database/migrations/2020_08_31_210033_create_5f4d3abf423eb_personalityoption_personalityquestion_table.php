<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5f4d3abf423ebPersonalityoptionPersonalityquestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('personalityoption_personalityquestion')) {
            Schema::create('personalityoption_personalityquestion', function (Blueprint $table) {
                $table->integer('personalityoption_id')->unsigned()->nullable();
                $table->foreign('personalityoption_id', 'fk_p_50188_50186_personal_5f4d3abf424bc')->references('id')->on('personalityoptions')->onDelete('cascade');
                $table->integer('personalityquestion_id')->unsigned()->nullable();
                $table->foreign('personalityquestion_id', 'fk_p_50186_50188_personal_5f4d3abf4250d')->references('id')->on('personalityquestions')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personalityoption_personalityquestion');
    }
}
