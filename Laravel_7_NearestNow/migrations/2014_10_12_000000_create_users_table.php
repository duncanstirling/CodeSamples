<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->enum('role',['admin','author','subscriber'])->default('author');
            $table->rememberToken();
            $table->timestamps();
        });
    }*/

public function up()
{
Schema::create('users', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('name');
    $table->string('email')->unique()->nullable();
    $table->string('provider')->default('email');
    $table->string('provider_id')->nullable();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password')->nullable();
	$table->enum('role',['admin','author','premium_paid','basic_paid','free'])->default('free');
    $table->rememberToken()->nullable();
    $table->timestamps();
});
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
