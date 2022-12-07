<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name', 100)->nullable()->change();
            $table->string('image', 50)->nullable();
            $table->string('email', 100)->nullable()->change();
            $table->date('birthdate')->nullable();
            $table->string('phone')->nullable();
            $table->string('address', 100)->nullable();
            $table->text('about_me')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable()->change();
            $table->smallInteger('role')->nullable();
            $table->dropColumn('email_verified_at');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('image');
            $table->dropColumn('birthdate');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('about_me');
            $table->dropColumn('username');
            $table->dropColumn('password');
            $table->dropColumn('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->dropSoftDeletes();
        });
    }
}
