<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentFrequenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_frequencies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //nombre de la frecuencia de pogos
            $table->timestamps();
            $table->string('registred')->nullable(); //usuario que modifica
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_frequencies');
    }
}
