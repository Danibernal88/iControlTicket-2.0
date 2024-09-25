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
        Schema::create('seguridadesSocial', function (Blueprint $table) {
            $table->id('idSegSocial');
            $table->timestamp('fechaPago')->nullable();
            $table->string('periodoSegSocial')->nullable();
            $table->timestamp('vtoSegSocial')->nullable();
            $table->timestamps();
            $table->foreignId('idhv')->nullable()->references('idhv')->on('hojasVida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguridadesSocial');
    }
};
