<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_datum_id')->nullable(); //Foranea de datos de compañia 
            $table->string('first_name'); //orginal name
            $table->string('last_name'); //apellido
            $table->string('email')->unique();
            $table->string('username')->unique(); //usuario
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); //clave
            $table->unsignedBigInteger('city_id')->nullable(); //Foranea de ciudad
            $table->string('phone', 50)->nullable(); //telefono
            $table->string('identification_document', 50)->nullable(); //documento
            $table->date('birth_date')->nullable(); //nacimiento
            $table->string('gender', 10)->nullable(); //genero
            $table->unsignedBigInteger('area_id')->nullable(); //foranea de area
            $table->unsignedBigInteger('scholarship_id')->nullable(); //foranea de escolaridad
            $table->string('postal_code')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
