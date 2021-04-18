<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1599071899UservideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('uservideos')) {
            Schema::create('uservideos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('videourl')->nullable();
                $table->string('user_id')->nullable();
                $table->string('title')->nullable();
                $table->string('location')->nullable();
                $table->string('datetime')->nullable();
                $table->string('description')->nullable();
                $table->string('viewed')->nullable();
                
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
        Schema::dropIfExists('uservideos');
    }
}
