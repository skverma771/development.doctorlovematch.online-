<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1598987119UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

if (!Schema::hasColumn('users', 'matchstatus')) {
                $table->string('matchstatus')->nullable();
                }
if (!Schema::hasColumn('users', 'customer_id')) {
                $table->string('customer_id')->nullable();
                }
if (!Schema::hasColumn('users', 'status')) {
                $table->string('status')->nullable();
                }
if (!Schema::hasColumn('users', 'cancelmembership')) {
                $table->string('cancelmembership')->nullable();
                }
if (!Schema::hasColumn('users', 'unsubscribeemail')) {
                $table->string('unsubscribeemail')->nullable();
                }
if (!Schema::hasColumn('users', 'usersubscribe')) {
                $table->string('usersubscribe')->nullable();
                }
if (!Schema::hasColumn('users', 'shareedit')) {
                $table->string('shareedit')->nullable();
                }
if (!Schema::hasColumn('users', 'sharetime')) {
                $table->string('sharetime')->nullable();
                }
if (!Schema::hasColumn('users', 'block')) {
                $table->string('block')->nullable();
                }
if (!Schema::hasColumn('users', 'sendemail')) {
                $table->string('sendemail')->nullable();
                }
if (!Schema::hasColumn('users', 'lastvisitdate')) {
                $table->string('lastvisitdate')->nullable();
                }
if (!Schema::hasColumn('users', 'activation')) {
                $table->string('activation')->nullable();
                }
if (!Schema::hasColumn('users', 'params')) {
                $table->string('params')->nullable();
                }
if (!Schema::hasColumn('users', 'lastresettime')) {
                $table->string('lastresettime')->nullable();
                }
if (!Schema::hasColumn('users', 'resetcount')) {
                $table->string('resetcount')->nullable();
                }
if (!Schema::hasColumn('users', 'otpkey')) {
                $table->string('otpkey')->nullable();
                }
if (!Schema::hasColumn('users', 'otep')) {
                $table->string('otep')->nullable();
                }
if (!Schema::hasColumn('users', 'requirereset')) {
                $table->string('requirereset')->nullable();
                }
if (!Schema::hasColumn('users', 'lookingfor')) {
                $table->string('lookingfor')->nullable();
                }
if (!Schema::hasColumn('users', 'ethnicity')) {
                $table->string('ethnicity')->nullable();
                }
if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender')->nullable();
                }
if (!Schema::hasColumn('users', 'personality')) {
                $table->string('personality')->nullable();
                }
            if (!Schema::hasColumn('users', 'pictures')) {
                $table->mediumText('pictures')->nullable();
            }
            if (!Schema::hasColumn('users', 'online')) {
                $table->string('online')->nullable();
            }

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('matchstatus');
            $table->dropColumn('customer_id');
            $table->dropColumn('status');
            $table->dropColumn('cancelmembership');
            $table->dropColumn('unsubscribeemail');
            $table->dropColumn('usersubscribe');
            $table->dropColumn('shareedit');
            $table->dropColumn('sharetime');
            $table->dropColumn('block');
            $table->dropColumn('sendemail');
            $table->dropColumn('lastvisitdate');
            $table->dropColumn('activation');
            $table->dropColumn('params');
            $table->dropColumn('lastresettime');
            $table->dropColumn('resetcount');
            $table->dropColumn('otpkey');
            $table->dropColumn('otep');
            $table->dropColumn('requirereset');
            $table->dropColumn('lookingfor');
            $table->dropColumn('ethnicity');
            $table->dropColumn('gender');
            $table->dropColumn('personality');

        });

    }
}
