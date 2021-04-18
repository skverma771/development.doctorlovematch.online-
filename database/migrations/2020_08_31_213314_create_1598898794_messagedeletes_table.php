<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598898794MessagedeletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('messagedeletes')) {
            Schema::create('messagedeletes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('from_user_id')->nullable();
                $table->string('to_id')->nullable();
                $table->string('msg_id')->nullable();
                $table->string('status')->nullable();
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
        Schema::dropIfExists('messagedeletes');
    }
}
