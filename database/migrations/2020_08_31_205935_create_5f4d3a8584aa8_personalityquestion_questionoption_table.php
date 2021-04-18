<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5f4d3a8584aa8PersonalityquestionQuestionoptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('personalityquestion_questionoption')) {
            Schema::create('personalityquestion_questionoption', function (Blueprint $table) {
                $table->integer('personalityquestion_id')->unsigned()->nullable();
                $table->foreign('personalityquestion_id', 'fk_p_50186_50187_question_5f4d3a8584b6c')->references('id')->on('personalityquestions')->onDelete('cascade');
                $table->integer('questionoption_id')->unsigned()->nullable();
                $table->foreign('questionoption_id', 'fk_p_50187_50186_personal_5f4d3a8584bb8')->references('id')->on('questionoptions')->onDelete('cascade');
                
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
        Schema::dropIfExists('personalityquestion_questionoption');
    }
}
