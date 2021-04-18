<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1599071816AstrologycalcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('astrologycalcs')) {
            Schema::create('astrologycalcs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('zodiac')->nullable();
                $table->string('daterange')->nullable();
                $table->string('zodiac_images')->nullable();
                
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
        Schema::dropIfExists('astrologycalcs');
    }
}
