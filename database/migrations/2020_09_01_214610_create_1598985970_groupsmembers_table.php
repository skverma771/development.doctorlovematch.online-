<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598985970GroupsmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('groupsmembers')) {
            Schema::create('groupsmembers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('groupid')->nullable();
                $table->string('memberid')->nullable();
                $table->string('approved')->nullable();
                $table->string('requestrecbyid')->nullable();
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
        Schema::dropIfExists('groupsmembers');
    }
}
