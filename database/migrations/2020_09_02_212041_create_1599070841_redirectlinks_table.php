<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1599070841RedirectlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('redirectlinks')) {
            Schema::create('redirectlinks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('old_url')->nullable();
                $table->string('new_url')->nullable();
                $table->string('referer')->nullable();
                $table->string('comment')->nullable();
                $table->string('hits')->nullable();
                $table->string('published')->nullable();
                $table->string('created_date')->nullable();
                $table->string('modified_date')->nullable();
                $table->string('header')->nullable();
                
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
        Schema::dropIfExists('redirectlinks');
    }
}
