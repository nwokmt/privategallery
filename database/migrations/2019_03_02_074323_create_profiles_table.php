<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('profiles', function (Blueprint $table) {	
            	$table->increments('id');
            	$table->string('email',255)->nullable();
            	$table->string('name',255);
            	$table->text('introduction')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
