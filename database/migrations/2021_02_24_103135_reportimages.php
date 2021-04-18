<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reportimages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('reportimages')) {
            Schema::create('reportimages', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_id')->nullable();
                $table->string('member_id')->nullable();
                $table->string('image_url')->nullable();
                $table->string('type')->nullable();

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
        //
    }
}
