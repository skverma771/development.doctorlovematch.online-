<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598898863MessageblocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('messageblocks')) {
            Schema::create('messageblocks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_id')->nullable();
                $table->string('member_id')->nullable();
                $table->string('isblock')->nullable();
                $table->string('isspamorreport')->nullable();
                
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
        Schema::dropIfExists('messageblocks');
    }
}
