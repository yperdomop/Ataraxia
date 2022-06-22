<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //la tabla morficacion
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documentable_id'); //id de usuario o compañia
            $table->string('documentable_type'); //identificación del modelo
            $table->string('document_route'); //ruta del documento
            $table->unsignedBigInteger('document_type_id')->nullable(); //tipo de documento
            $table->timestamps();
            $table->string('registred')->nullable(); //usuario que modifica

            //llaves foraneas
            $table->foreign('document_type_id')->references('id')->on('document_types')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
