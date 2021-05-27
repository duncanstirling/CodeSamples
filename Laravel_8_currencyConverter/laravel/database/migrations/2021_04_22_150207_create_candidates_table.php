<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('candidates', function (Blueprint $table) {
		  $table->bigIncrements('id');
		  $table->string('description');	  
		  $table->enum('currency',['EUR','GBP','USD']);		  
		  $table->string('rate');
		  $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('tasks');
    }
}
