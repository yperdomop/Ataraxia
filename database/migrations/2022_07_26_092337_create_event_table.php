<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // nombre del evento
            $table->date('date'); // fecha del evento
            $table->string('address'); //direccion del evento
            $table->string('location'); //localización
            $table->string('registred')->nullable(); //usuario que modifica

            $table->unsignedBigInteger('city_id')->nullable(); //Foranea de ciudad

            $table->timestamps();
            //llaves foraneas
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
