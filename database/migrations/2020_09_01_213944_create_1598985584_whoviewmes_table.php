<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598985584WhoviewmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('whoviewmes')) {
            Schema::create('whoviewmes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('userid')->nullable();
                $table->string('memberid')->nullable();
                $table->string('notifystatus')->nullable();
                $table->string('notifycancelstatus')->nullable();
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
        Schema::dropIfExists('whoviewmes');
    }
}
