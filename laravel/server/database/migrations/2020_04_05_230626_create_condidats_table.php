<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condidats', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->binary('image')->nullable() ;
            $table->string('cin')->unique();
            $table->string('cne')->unique();   
            $table->string('tele')->unique();
            $table->string('nom');
            $table->string('prenom'); 
            $table->string('sexe'); 
            $table->year('date_du_bac');
            $table->string('filiere_du_bac');
            $table->date('date_de_naissance');
            $table->string('lieu_de_naissance');
            $table->string('pays');  
            $table->string('region');
            $table->string('province');
            $table->string('adress');
            $table->Integer('filier_id_1')->unsigned();
            $table->Integer('filier_id_2')->unsigned();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->boolean('accept')->default(false);
            $table->rememberToken();
            $table->timestamps();
    
        });
         // for forieng key 
         Schema::table('condidats', function (Blueprint $table) {
            $table->foreign('filier_id_1')
            ->references('id')
            ->on('filiers');
        });
         // for forieng key 
         Schema::table('condidats', function (Blueprint $table) {
            $table->foreign('filier_id_2')
            ->references('id')
            ->on('filiers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condidats'); 
    }
}


        
    


