<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598898676MessageconectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('messageconections')) {
            Schema::create('messageconections', function (Blueprint $table) {
                $table->increments('id');
                $table->string('msg_id')->nullable();
                $table->string('sender_id')->nullable();
                $table->string('receiver_id')->nullable();
                $table->string('notifystatus')->nullable();
                $table->string('notifycancelstatus')->nullable();
                $table->string('paymentstatus')->nullable();
                $table->string('readstatus')->nullable();
                
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
        Schema::dropIfExists('messageconections');
    }
}
