<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewUserFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function (Blueprint $table) {
           $table->string('last_name')->nullable();
           $table->string('identification_type')->nullable();
           $table->bigInteger('identification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function (Blueprint $table) {
           $table->dropColumn('last_name');
           $table->dropColumn('identification_type');
           $table->dropColumn('identification');
        });
    }
}
