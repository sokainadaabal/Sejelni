<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->String('civilite');
            $table->String('photo')->default('');
            $table->String('nom');
            $table->String('prenom');
            $table->integer('filier_id')->unsigned();
            $table->String('tel')->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('pay');
            $table->string('ville');
            $table->string('adress');
            $table->boolean('active')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
        // for forieng key 
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('filier_id')
            ->references('id')
            ->on('filiers');
        });
       
        DB::table('admins')->insert(
            array(
                'civilite'=>'mll',
                'photo'=>'',
                'nom'=>'Daabal',
                'prenom'=>'Sokaina',
                'filier_id'=>1,
                'tel'=>'0644338075',
                'email' => 'sokainadaabal@gmail.com',
                'password' => bcrypt('admin'),
                'pay'=>'Maroc',
                'ville'=>'el Jadida',
                'adress'=>'85 rue belgrade',
                'active' => true
     
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
