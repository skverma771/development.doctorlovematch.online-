<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1599070968AstrologycalcsignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('astrologycalcsigns')) {
            Schema::create('astrologycalcsigns', function (Blueprint $table) {
                $table->increments('id');
                $table->string('signfrom')->nullable();
                $table->string('signto')->nullable();
                $table->mediumText('description')->nullable();

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
        Schema::dropIfExists('astrologycalcsigns');
    }
}
