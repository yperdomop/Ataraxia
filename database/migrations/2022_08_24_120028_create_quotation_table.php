<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->integer('price'); //precio de la cotización
            $table->date('date'); // fecha de la cotización
            $table->string('route'); //ruta del archivo de cotización
            $table->unsignedBigInteger('company_datum_id')->nullable(); //Foranea de datos compañia
            $table->unsignedBigInteger('sport_id')->nullable(); //Foranea de deporte
            $table->timestamps();
            //llaves foraneas
            $table->foreign('company_datum_id')->references('id')->on('company_data')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('sport_id')->references('id')->on('sports')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation');
    }
}
