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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('id_visitante', 20)->nullable();
            $table->string('id_institucional', 9)->nullable();
            $table->foreign('id_visitante')->references('id_visitante')->on('visitantes');
            $table->foreign('id_institucional')->references('id_institucional')->on('comunidads');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingreso');
    }
};
