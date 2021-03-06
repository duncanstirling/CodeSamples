<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNnsearchparentcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nnsearchparentcategories', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('searchtype_id');
			$table->foreign('searchtype_id')
			->references('id')->on('nnsearchtypes')
			->onDelete('cascade');			
			$table->string('searchparentcategory_name');
			$table->string('searchparentcategory_title');			
			$table->string('searchparentcategory_icon');				
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
        Schema::dropIfExists('nnsearchparentcategories');
    }
}
