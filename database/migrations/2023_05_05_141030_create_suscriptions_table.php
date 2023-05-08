<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('Suscrito');
            $table->string('time')->nullable();
            $table->double('amount')->nullable();
            $table->unsignedBigInteger('photographer_id')->nullable();
            $table->unsignedBigInteger('organizer_id')->nullable();
            $table->foreign('photographer_id')->references('id')->on('photographers')->onUpdate('cascade');
            $table->foreign('organizer_id')->references('id')->on('organizers')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suscriptions');
    }
}
