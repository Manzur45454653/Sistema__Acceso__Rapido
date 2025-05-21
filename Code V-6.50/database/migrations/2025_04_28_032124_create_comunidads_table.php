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
        Schema::create('comunidads', function (Blueprint $table) {
            $table->id();
            $table->string('id_institucional', 9)->unique();
            $table->string('nombre', 255);
            $table->string('apellido_materno', 255);
            $table->string('apellido_paterno', 255);
            $table->unsignedBigInteger('id_plantel')->nullable();
            $table->unsignedBigInteger('id_puesto')->nullable();// El campo puede ser nulo            
            $table->unsignedBigInteger('id_oferta')->nullable();// El campo puede ser nulo            
            $table->string('estado', 2);
            $table->text('fotografia');
            $table->text('code_qr');
            $table->timestamps();
            $table->foreign('id_plantel')->references('id_plantel')->on('planteles');
            $table->foreign('id_puesto')->references('id_puesto')->on('puestos');
            $table->foreign('id_oferta')->references('id_oferta')->on('ofertas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunidads');
    }
};
