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
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nombre', 255);
            $table->string('apellido_materno', 255);
            $table->string('apellido_paterno', 255);
            $table->text('motivo');
            $table->string('genero', 50);
            $table->string('menor', 1);
            $table->text('identificacion');
            $table->text('code_qr');
            $table->string('reactivacion', 1);
            $table->json('fechas_impresion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitantes');
    }
};
