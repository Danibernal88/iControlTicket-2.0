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
        Schema::create('sociedades', function (Blueprint $table) {
            $table->id('idSociedad');
            $table->string('nombreSociedad');
            $table->integer('jerarquiaSociedad');
            $table->string('autoretenedor');
            $table->string('impCompra');
            $table->string('impVenta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sociedades');
    }
};
