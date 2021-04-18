<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598897105PersonalityanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('personalityanswers')) {
            Schema::create('personalityanswers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('userid')->nullable();
                $table->string('questionid')->nullable();
                $table->string('optionid')->nullable();
                $table->string('created')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('personalityanswers');
    }
}
