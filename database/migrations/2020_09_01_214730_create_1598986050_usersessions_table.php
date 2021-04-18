<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598986050UsersessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('usersessions')) {
            Schema::create('usersessions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('userid')->nullable();
                $table->string('username')->nullable();
                $table->string('userstatus')->nullable();
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
        Schema::dropIfExists('usersessions');
    }
}
