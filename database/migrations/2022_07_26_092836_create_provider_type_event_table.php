<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderTypeEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_provider_type', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable(); //descripción 
            $table->unsignedBigInteger('event_id')->nullable(); //Foranea de evento
            $table->unsignedBigInteger('provider_type_id')->nullable(); //Foranea de tipo provedor

            $table->timestamps();
            //llaves foraneas
            $table->foreign('event_id')->references('id')->on('events')->cascadeOnUpdate()->nullOnDelete();

            $table->foreign('provider_type_id')->references('id')->on('provider_types')->cascadeOnUpdate()->nullOnDelete();
        });

        Schema::table('company_data', function (Blueprint $table) {
            $table->foreign('provider_type_id')->references('id')->on('provider_types')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_type_event');
    }
}
