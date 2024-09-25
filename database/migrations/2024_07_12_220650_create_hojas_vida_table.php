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
        Schema::create('hojasVida', function (Blueprint $table) {
            $table->id('idhv');
            $table->string('estado')->nullable();
            $table->timestamp('fecha_ing')->nullable();
            $table->string('TipoContrato')->nullable();
            $table->string('cargoHV')->nullable();
            $table->string('tipoEmpl')->nullable();
            $table->timestamp('fechanto')->nullable();
            $table->timestamp('fechaDef')->nullable();
            $table->string('tiposangre')->nullable();
            $table->string('estadocivil')->nullable();
            $table->string('nivelEstudio')->nullable();
            $table->string('habilidades')->nullable();
            $table->string('licencia')->nullable();
            $table->string('categoria')->nullable();
            $table->timestamp('vigLicencia')->nullable();
            $table->string('jefeInmediato')->nullable();
            $table->timestamp('fechaAfilSS')->nullable();
            $table->string('EPS')->nullable();
            $table->string('ARP')->nullable();
            $table->string('FP')->nullable();
            $table->string('CCF')->nullable();
            $table->string('Cesantias')->nullable();
            $table->string('EntBancaria')->nullable();
            $table->string('TipoCuenta')->nullable();
            $table->string('NroCuenta')->nullable();
            $table->timestamp('ultPagoSS')->nullable();
            $table->string('notasHV')->nullable();
            $table->string('rutaImgFoto')->nullable();
            $table->string('rutaImgCedulaF')->nullable();
            $table->string('rutaImgLicenciaF')->nullable();
            $table->string('rutaImgCedulaP')->nullable();
            $table->string('rutaImgLicenciaP')->nullable();
            $table->string('rutaImgLMilitarF')->nullable();
            $table->string('rutaImgLMilitarP')->nullable();
            $table->foreignId('idtercero')->nullable()->references('idTerceros')->on('terceros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hojasVida');
    }
};
