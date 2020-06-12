<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nom');
            $table->integer('filier_id')->unsigned();
            $table->timestamps();
        });
        // for forieng key 
        Schema::table('options', function (Blueprint $table) {
            $table->foreign('filier_id')
            ->references('id')
            ->on('filiers')>onDelete('cascade');;
        });
    }
      
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
