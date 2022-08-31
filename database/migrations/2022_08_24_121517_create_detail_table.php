<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('service_type'); //Tipo de servicio
            $table->string('Property_name'); //Nombre del establecimiento */
            $table->integer('price');
            $table->string('location');
            $table->text('description');
            $table->string('transport type');
            $table->unsignedBigInteger('quotation_id')->nullable(); //Foranea de datos compañia
            $table->timestamps();
            //llaves foraneas
            $table->foreign('quotation_id')->references('id')->on('quotations')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail');
    }
}
