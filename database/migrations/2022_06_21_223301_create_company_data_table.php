<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_data', function (Blueprint $table) {
            $table->id();
            $table->string('bussiness_name')->unique(); //razón social
            $table->string('language')->nullable(); //idioma
            $table->timestamps();
            $table->string('postal_code')->nullable();
            $table->string('legal_representative');
            $table->string('legal_representative_document');
            $table->string('nit')->unique();
            $table->string('address'); //direccion
            $table->string('phone', 50); //telefono
            $table->unsignedBigInteger('city_id')->nullable(); //Foranea de ciudad
            $table->string('email')->unique();
            $table->unsignedBigInteger('sport_id')->nullable(); //Foranea de deporte
            $table->unsignedBigInteger('provider_type_id')->nullable(); //Foranea de tipo proveedor
            $table->string('registred')->nullable(); //usuario que modifica

            //llaves foraneas
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('company_data');
    }
}
