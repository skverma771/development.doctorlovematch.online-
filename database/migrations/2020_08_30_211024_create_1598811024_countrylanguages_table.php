<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598811024CountrylanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('countrylanguages')) {
            Schema::create('countrylanguages', function (Blueprint $table) {
                $table->increments('id');
                $table->string('countrycode')->nullable();
                $table->string('language')->nullable();
                $table->string('isofficial')->nullable();
                $table->string('percentage')->nullable();
                
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
        Schema::dropIfExists('countrylanguages');
    }
}
