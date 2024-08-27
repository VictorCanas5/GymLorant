<?php

use App\Models\Asistencia;
use App\Models\NominaEmpleado;
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
        Schema::create('nomina_asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NominaEmpleado::class);
            $table->foreignIdFor(Asistencia::class);
            $table->double('horas_extra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina_asistencias');
    }
};
