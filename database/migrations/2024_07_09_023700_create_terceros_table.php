<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->id('idTerceros');
            $table->string('dvTercero');
            $table->string('naturalezaTercero');
            $table->string('nombre1Tercero');
            $table->string('nombre2Tercero');
            $table->string('apellido1Tercero');
            $table->string('apellido2Tercero');
            $table->string('nombreCompleto');
            $table->string('direccionTercero');
            $table->string('telefonoTercero');
            $table->string('movilTercero');
            $table->string('contactoTercero');
            $table->string('ceduContactoTercero');
            $table->string('direccionContacto');
            $table->string('telefonoContacto');
            $table->string('mailTercero');
            $table->boolean('autData');
            $table->string('tipoTercero');
            $table->text('obsTercero');
            $table->string('estado');
            $table->string('rutaRut');
            $table->foreignId('IdEmpresa')->nullable()->references('idEmpresa')->on('empresas');
            $table->foreignId('idIdentidad')->nullable()->references('idIdentidad')->on('identidades');
            $table->foreignId('idSociedad')->nullable()->references('idSociedad')->on('sociedades');
            $table->foreignId('idCenPob')->nullable()->references('idCenPob')->on('poblaciones');
            $table->foreignId('idPaises')->nullable()->references('idPaises')->on('paises');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terceros');
    }
};
