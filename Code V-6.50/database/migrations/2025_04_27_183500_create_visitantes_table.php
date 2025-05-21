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
            $table->id();
            $table->string('id_visitante', 20)->unique();
            $table->string('nombre', 255);
            $table->string('apellido_paterno', 255);
            $table->string('apellido_materno', 255)->nullable();
            $table->text('motivo');
            $table->string('menor', 1);
            $table->text('numIdenFile')->nullable();
            $table->text('identificacion')->nullable();
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
