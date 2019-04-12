<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_order', function (Blueprint $table) {	
        	$table->primary('id');
        	$table->integer('order_id');
        	$table->integer('item_id');
        	$table->timestamp('created_at')->nullable();
        	$table->timestamp('updated_at')->nullable();

              $table->index('order_id');
              $table->index('item_id');
         
              $table->foreign('item_id')
                    ->references('id')
                    ->on('orders')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
         
              $table->foreign('item_id')
                    ->references('id')
                    ->on('items')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
