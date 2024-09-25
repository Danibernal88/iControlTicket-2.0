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
        Schema::table('terceros', function (Blueprint $table) {
            $table->string('dvTercero')->nullable()->change();
            $table->string('naturalezaTercero')->nullable()->change();
            $table->string('nombre1Tercero')->nullable()->change();
            $table->string('nombre2Tercero')->nullable()->change();
            $table->string('apellido1Tercero')->nullable()->change();
            $table->string('apellido2Tercero')->nullable()->change();
            $table->string('nombreCompleto')->nullable()->change();
            $table->string('direccionTercero')->nullable()->change();
            $table->string('telefonoTercero')->nullable()->change();
            $table->string('movilTercero')->nullable()->change();
            $table->string('contactoTercero')->nullable()->change();
            $table->string('ceduContactoTercero')->nullable()->change();
            $table->string('direccionContacto')->nullable()->change();
            $table->string('telefonoContacto')->nullable()->change();
            $table->string('mailTercero')->nullable()->change();
            $table->string('tipoTercero')->nullable()->change();
            $table->text('obsTercero')->nullable()->change();
            $table->string('rutaRut')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('terceros', function (Blueprint $table) {
            $table->string('dvTercero')->nullable(false)->change();
            $table->string('naturalezaTercero')->nullable(false)->change();
            $table->string('nombre1Tercero')->nullable(false)->change();
            $table->string('nombre2Tercero')->nullable(false)->change();
            $table->string('apellido1Tercero')->nullable(false)->change();
            $table->string('apellido2Tercero')->nullable(false)->change();
            $table->string('nombreCompleto')->nullable(false)->change();
            $table->string('direccionTercero')->nullable(false)->change();
            $table->string('telefonoTercero')->nullable(false)->change();
            $table->string('movilTercero')->nullable(false)->change();
            $table->string('contactoTercero')->nullable(false)->change();
            $table->string('ceduContactoTercero')->nullable(false)->change();
            $table->string('direccionContacto')->nullable(false)->change();
            $table->string('telefonoContacto')->nullable(false)->change();
            $table->string('mailTercero')->nullable(false)->change();
            $table->string('tipoTercero')->nullable(false)->change();
            $table->timestamp('obsTercero')->nullable(false)->change();
            $table->string('rutaRut')->nullable(false)->change();
        });
    }
};
