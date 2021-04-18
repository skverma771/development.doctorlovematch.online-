<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598809243UsernotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('usernotifications')) {
            Schema::create('usernotifications', function (Blueprint $table) {
                $table->increments('id');
                $table->string('catgories')->nullable();
                $table->string('userid')->nullable();
                $table->string('memberid')->nullable();
                $table->string('notifystatus')->nullable();
                $table->string('datetime')->nullable();
                $table->string('requestid')->nullable();
                $table->string('notifycancelstatus')->nullable();
                
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
        Schema::dropIfExists('usernotifications');
    }
}
