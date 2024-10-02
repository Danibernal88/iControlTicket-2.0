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
        Schema::create('bimestrales', function (Blueprint $table) {
            $table->id('idRPbimest');
            $table->string('nombreCDA')->nullable();
            $table->timestamp('fechaExpRPbimest')->default(now());
            $table->timestamp('fechaVtoRPbimest')->default(now());
            $table->string('nroCertCDARPbimest')->nullable();
            $table->text('descripcionRPbimest')->nullable();
            $table->foreignId('idVehiculo')->nullable()->references('id')->on('vehiculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimestrales');
    }
};
