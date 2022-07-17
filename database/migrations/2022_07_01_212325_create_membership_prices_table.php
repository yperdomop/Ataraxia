<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_frequency_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->integer('price');
            $table->timestamps();
            $table->string('registred')->nullable();
            $table->foreign('payment_frequency_id')->references('id')->on('payment_frequencies')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_prices');
    }
}
