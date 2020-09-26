<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {                  
            
            $table->increments('id');
            $table->integer('user_id')->unsigned(); 
            $table->string('ticket_id')->unique();  //save random unique id
            $table->string('title');
            $table->string('email');  //one user can open many tickets using same email 
            $table->string('phone_no');
            $table->string('fname');
            $table->string('lname');
            $table->text('message');
            $table->string('status');
            $table->boolean('read')->default('0');
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
        Schema::dropIfExists('tickets');
    }
}
