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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('idEmpresa');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('movil');
            $table->string('email');
            $table->string('web');
            $table->string('codDirTerritorial');
            $table->string('nroResolucionEmp');
            $table->date('fechaHab');
            $table->string('foto');
            $table->string('RLEmpresa');
            $table->string('NitEmpresa');
            $table->string('Regimen');
            $table->string('Lema');
            $table->string('nivelServ');
            $table->string('rutaCarpDocHV');
            $table->string('rutaCarpDocVEH');
            $table->string('rutaCarpDocTER');
            $table->boolean('logoISO');
            $table->text('habeasData');
            $table->foreignId('ciudad')->nullable()->references('idCenPob')->on('poblaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
