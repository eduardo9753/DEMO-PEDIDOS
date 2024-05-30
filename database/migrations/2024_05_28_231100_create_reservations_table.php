<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('title');    //nombre de la reservacion
            $table->string('customer_name');    //nombre de cliente pide la reserva
            $table->string('number_phone');     //whatsapp
            $table->string('url')->nullable();  //algun url
            $table->integer('number_of_seats'); //numero de sillas

            // Fechas y horas de la reserva
            $table->date('start')->nullable();       // Fecha de inicio de la reserva
            $table->date('end')->nullable();         // Fecha de fin de la reserva (si aplica)
            $table->time('hour_start')->nullable();        // Hora incio reserva
            $table->time('hour_end')->nullable();        // Hora fin reserva
            $table->string('state')->nullable();

            // Claves foráneas
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('user_id');


            // Restricciones de clave foránea
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('reservations');
    }
}
