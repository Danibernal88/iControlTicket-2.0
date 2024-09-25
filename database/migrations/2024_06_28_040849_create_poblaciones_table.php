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
        Schema::create('poblaciones', function (Blueprint $table) {
            $table->id('idCenPob');
            $table->string('CentroPoblado');
            $table->string('Municipio');
            $table->string('Departamento');
            $table->string('DANE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poblaciones');
    }
};
