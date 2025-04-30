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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nombre', 255);
            $table->string('apellido_materno', 255);
            $table->string('apellido_paterno', 255);
            $table->string('genero', 50);
            $table->unsignedBigInteger('id_plantel');
            $table->unsignedBigInteger('id_puesto');            
            $table->string('estado', 2);
            $table->text('fotografia');
            $table->text('code_qr');
            $table->timestamps();
            $table->foreign('id_plantel')->references('id_plantel')->on('planteles');
            $table->foreign('id_puesto')->references('id_puesto')->on('puestos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores');
    }
};
