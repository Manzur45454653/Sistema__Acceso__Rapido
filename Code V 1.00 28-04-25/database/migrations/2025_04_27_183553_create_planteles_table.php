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
        Schema::create('planteles', function (Blueprint $table) {
            $table->id('id_plantel');
            $table->string('plantel', 500);
            $table->string('direccion', 500);
            $table->string('correo', 100);
            $table->string('telefono', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planteles');
    }
};
