<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDriverFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('dni')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('license')->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('dni');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('birth_date');
            $table->dropColumn('license');

            $table->dropSoftDeletes();
        });
    }
}
