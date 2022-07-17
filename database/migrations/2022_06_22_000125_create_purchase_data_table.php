<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_datum_id')->nullable(); //id de compañia
            $table->integer('price'); //valor
            $table->unsignedBigInteger('membership_price_id')->nullable(); //id de membresia
            $table->date('purchase_date')->nullable(); //fecha de compra
            $table->date('expiration_date')->nullable(); //fecha de vencimiento            
            $table->timestamps();
            $table->string('registred')->nullable(); //usuario que modifica

            $table->foreign('company_datum_id')->references('id')->on('company_data')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_data');
    }
}
