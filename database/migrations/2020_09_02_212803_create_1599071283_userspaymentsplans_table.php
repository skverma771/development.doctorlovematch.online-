<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1599071283UserspaymentsplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('userspaymentsplans')) {
            Schema::create('userspaymentsplans', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_id')->nullable();
                $table->string('payment_id')->nullable();
                $table->string('plan_id')->nullable();
                $table->string('plan_date')->nullable();
                $table->string('expire_date')->nullable();
                
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
        Schema::dropIfExists('userspaymentsplans');
    }
}
