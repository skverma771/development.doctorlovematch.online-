<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598896771QuestionoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('questionoptions')) {
            Schema::create('questionoptions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('options')->nullable();
                $table->string('questionid');
                $table->string('questionoptions');
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
        Schema::dropIfExists('questionoptions');
    }
}
