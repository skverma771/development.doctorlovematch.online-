<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1598987222UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
if (!Schema::hasColumn('users', 'aboutme')) {
                $table->text('aboutme')->nullable();
                }
if (!Schema::hasColumn('users', 'dob')) {
                $table->date('dob')->nullable();
                }
if (!Schema::hasColumn('users', 'devicetype')) {
                $table->string('devicetype')->nullable();
                }
if (!Schema::hasColumn('users', 'devicetoken')) {
                $table->string('devicetoken')->nullable();
                }
if (!Schema::hasColumn('users', 'facebookid')) {
                $table->string('facebookid')->nullable();
                }
if (!Schema::hasColumn('users', 'gmailid')) {
                $table->string('gmailid')->nullable();
                }
if (!Schema::hasColumn('users', 'ntcount')) {
                $table->string('ntcount')->nullable();
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
            $table->dropColumn('aboutme');
            $table->dropColumn('dob');
            $table->dropColumn('devicetype');
            $table->dropColumn('devicetoken');
            $table->dropColumn('facebookid');
            $table->dropColumn('gmailid');
            $table->dropColumn('ntcount');
            
        });

    }
}
