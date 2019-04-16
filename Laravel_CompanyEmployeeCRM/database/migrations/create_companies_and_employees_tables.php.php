<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesAndEmployeesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->default('');
			$table->string('slug')->default('');
			$table->string('website')->default('');	
			$table->string('email')->default('');
			$table->string('logo')->default('');
			$table->timestamps();
		});

		Schema::create('employees', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('company_id')->unsigned()->default(0);
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');						
			$table->string('firstName')->default('');
			$table->string('lastName')->default('');	
			$table->string('name')->default('');			
			$table->string('slug')->default('');
			$table->string('email')->default('');
			$table->string('phone')->default('');
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
		Schema::dropIfExists('employees');		
		Schema::dropIfExists('companies');
    }
}
