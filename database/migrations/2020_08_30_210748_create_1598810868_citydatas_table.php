<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1598810868CitydatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('citydatas')) {
            Schema::create('citydatas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('countrycode')->nullable();
                $table->string('district')->nullable();
                $table->string('population')->nullable();
                
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
        Schema::dropIfExists('citydatas');
    }
}
