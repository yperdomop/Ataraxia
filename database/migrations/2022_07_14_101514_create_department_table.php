<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // nombre del departamento
            $table->string('registred')->nullable(); //usuario que modifica
            $table->unsignedBigInteger('country_id')->nullable(); //Foranea de pais
            $table->timestamps();

            //llaves foraneas
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
    }
}
