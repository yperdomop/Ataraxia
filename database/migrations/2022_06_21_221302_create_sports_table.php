<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //nombre del deporte
            $table->timestamps();
            $table->string('registred')->nullable(); //usuario que modifica
            $table->unsignedBigInteger('country_id')->nullable(); //foranea pais
            $table->unsignedBigInteger('state_id')->nullable(); //foranea departamento o estado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sports');
    }
}
