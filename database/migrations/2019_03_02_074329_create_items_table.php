<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {	
        	$table->increments('id');
        	$table->string('name',255);
        	$table->integer('price');
        	$table->text('description')->nullable();
        	$table->text('image')->nullable();
        	$table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });	
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
