<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdermadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordermades', function (Blueprint $table) {	
        	$table->increments('id');
        	$table->string('type',20);
        	$table->string('material',20);
        	$table->string('color',20);
        	$table->string('postalcode',10)->nullable();
        	$table->string('address',255);
        	$table->string('name',255);
        	$table->string('payment',20)->nullable();
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
        Schema::dropIfExists('ordermades');
    }
}
