<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiers', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nom')->unique();
            $table->timestamps();
        });
        DB::table('filiers')->insert(
            array(
                'nom' => 'GI',
            )
        );
        DB::table('filiers')->insert(
            array(
                'nom' => 'GA',
            )
        );
        DB::table('filiers')->insert(
            array(
                'nom' => 'TM',
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
        Schema::dropIfExists('filiers');
    }
}
