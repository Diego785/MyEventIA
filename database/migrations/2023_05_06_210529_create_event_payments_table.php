<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_payments', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('Pendiente');
            $table->double('amount');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('photographer_id')->nullable();
            $table->unsignedBigInteger('organizer_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('photographer_id')->references('id')->on('photographers')->onUpdate('cascade');
            $table->foreign('organizer_id')->references('id')->on('organizers')->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onUpdate('cascade');
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
        Schema::dropIfExists('event_payments');
    }
}
