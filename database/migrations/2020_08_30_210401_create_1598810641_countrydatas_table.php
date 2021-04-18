<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598810641CountrydatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('countrydatas')) {
            Schema::create('countrydatas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code')->nullable();
                $table->string('name')->nullable();
                $table->string('continent')->nullable();
                $table->string('region')->nullable();
                $table->string('surfacearea')->nullable();
                $table->string('indepyear')->nullable();
                $table->string('population')->nullable();
                $table->string('lifeexpectancy')->nullable();
                $table->string('gnp')->nullable();
                $table->string('gnpold')->nullable();
                $table->string('localname')->nullable();
                $table->string('governmentform')->nullable();
                $table->string('headofstate')->nullable();
                $table->string('capital')->nullable();
                $table->string('code2')->nullable();
                
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
        Schema::dropIfExists('countrydatas');
    }
}
