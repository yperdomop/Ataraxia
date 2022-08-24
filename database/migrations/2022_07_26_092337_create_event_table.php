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
            $table->unsignedBigInteger('company_datum_id')->nullable();
            $table->date('date'); // fecha del evento
            $table->string('address'); //direccion del evento
            $table->unsignedBigInteger('city_from_id')->nullable(); //ciudad de origen
            $table->unsignedBigInteger('city_to_id')->nullable(); //Foranea de ciudad
            $table->string('registred')->nullable(); //usuario que modifica
            $table->integer('adult_passengers')->nullable();
            $table->integer('child_passengers')->nullable();
            $table->string('transport', 50);
            $table->text('observation')->nullable();

            $table->timestamps();
            //llaves foraneas
            $table->foreign('company_datum_id')->references('id')->on('company_data')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('city_from_id')->references('id')->on('cities')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('city_to_id')->references('id')->on('cities')->cascadeOnUpdate()->nullOnDelete();
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
