<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5f4d3ad8adaf3QuestionQuestionoptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('question_questionoption')) {
            Schema::create('question_questionoption', function (Blueprint $table) {
                $table->integer('question_id')->unsigned()->nullable();
                $table->foreign('question_id', 'fk_p_50185_50187_question_5f4d3ad8adbb5')->references('id')->on('questions')->onDelete('cascade');
                $table->integer('questionoption_id')->unsigned()->nullable();
                $table->foreign('questionoption_id', 'fk_p_50187_50185_question_5f4d3ad8adbfe')->references('id')->on('questionoptions')->onDelete('cascade');
                
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
        Schema::dropIfExists('question_questionoption');
    }
}
