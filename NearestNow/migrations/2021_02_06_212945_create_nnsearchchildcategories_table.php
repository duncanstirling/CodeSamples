<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNnsearchchildcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nnsearchchildcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('searchparentcategory_id');
			$table->foreign('searchparentcategory_id')
			->references('id')->on('nnsearchparentcategories')
			->onDelete('cascade');				
			$table->string('searchchildcategory_name');
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
        Schema::dropIfExists('nnsearchchildcategories');
    }
}
