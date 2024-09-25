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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('NroInterno')->nullable();
            $table->timestamp('fechaAfil')->nullable();
            $table->timestamp('fechaDesafil')->nullable();
            $table->string('estado');
            $table->string('emprAfil')->nullable();
            $table->string('relacion')->nullable();
            $table->string('nroContrAfil')->nullable();
            $table->string('clase')->nullable();
            $table->string('marca')->nullable();
            $table->integer('modelo')->nullable();
            $table->string('combustible')->nullable();
            $table->boolean('vehEmpresa')->nullable()->default(0);
            $table->string('tipoTransporte')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('nroMatricula')->nullable();
            $table->string('orgTransito')->nullable();
            $table->timestamp('fechaExpMatric')->nullable();
            $table->string('linea')->nullable();
            $table->string('cilindraje')->nullable();
            $table->integer('capacPjs')->nullable();
            $table->string('color')->nullable();
            $table->string('motor')->nullable();
            $table->string('chasis')->nullable();
            $table->string('nroTarjOper')->nullable();
            $table->timestamp('fechaExpTO')->nullable();
            $table->timestamp('fechaVtoTO')->nullable();
            $table->string('nombreCDA')->nullable();
            $table->string('nroCertCDA')->nullable();
            $table->timestamp('fechaVtoExtintor')->nullable();
            $table->timestamp('fechaExpCDA')->nullable();
            $table->timestamp('fechaVtoCDA')->nullable();
            $table->string('aseguradoraSOAT')->nullable();
            $table->string('nroSOAT')->nullable();
            $table->timestamp('fechaExpSOAT')->nullable();
            $table->timestamp('fechaVtoSOAT')->nullable();
            $table->string('aseguradoraRCC')->nullable();
            $table->string('nroRCC')->nullable();
            $table->timestamp('fechaExpRCC')->nullable();
            $table->timestamp('fechaVtoRCC')->nullable();
            $table->string('aseguradoraRCE')->nullable();
            $table->string('nroRCE')->nullable();
            $table->timestamp('fechaExpRCE')->nullable();
            $table->timestamp('fechaVtoRCE')->nullable();
            $table->boolean('carct_TV')->nullable()->default(0);
            $table->boolean('carct_sonido')->nullable()->default(0);
            $table->boolean('carct_banio')->nullable()->default(0);
            $table->boolean('carct_sillaReclin')->nullable()->default(0);
            $table->boolean('carct_aireAcond')->nullable()->default(0);
            $table->boolean('carct_microf')->nullable()->default(0);
            $table->boolean('carct_GPS')->nullable()->default(0);
            $table->string('rutaImgVeh')->nullable();
            $table->string('rutaMatricula1')->nullable();
            $table->string('rutaMatricula2')->nullable();
            $table->string('rutaTOperacion1')->nullable();
            $table->string('rutaTOperacion2')->nullable();
            $table->string('rutaCDA')->nullable();
            $table->string('rutaSoat')->nullable();
            $table->string('rutaRCC')->nullable();
            $table->string('rutaRCE')->nullable();
            $table->foreignId('propietario')->nullable()->nullable()->references('idTerceros')->on('terceros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
