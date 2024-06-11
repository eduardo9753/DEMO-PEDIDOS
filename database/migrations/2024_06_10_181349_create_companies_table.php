<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social_empresa')->nullable();
            $table->string('sucursal_empresa')->nullable();
            $table->string('logotipo_empresa')->nullable();
            $table->string('numero_ruc_empresa')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->text('mapa_empresa')->nullable();
            $table->string('numero_uno_empresa')->nullable();
            $table->string('numero_dos_empresa')->nullable();
            $table->string('numero_tres_empresa')->nullable();
            $table->string('correo_empresa')->nullable();
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('companies');
    }
}
