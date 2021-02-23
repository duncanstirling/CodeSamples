<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// blog table
		Schema::create('posts', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('author_id');
			$table->foreign('author_id')
			->references('id')->on('users')
			->onDelete('cascade');
			$table->string('title')->unique();
			$table->text('body');
			$table->string('slug')->unique();
			$table->boolean('active');
			$table->enum('adverttype',['business','community','marketplace']);
			$table->string('advertparentcategory')->nullable();
			$table->string('advertchildcategory');
			$table->unsignedBigInteger('country_id');
			$table->unsignedBigInteger('city_id');			  
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
		// drop blog table
		Schema::drop('posts');
    }
}
