<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598985671UsercommeetrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('usercommeetrequests')) {
            Schema::create('usercommeetrequests', function (Blueprint $table) {
                $table->increments('id');
                $table->string('userid')->nullable();
                $table->string('memberid')->nullable();
                $table->string('userrequest')->nullable();
                $table->string('userresponse')->nullable();
                $table->string('datetime')->nullable();
                
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
        Schema::dropIfExists('usercommeetrequests');
    }
}
