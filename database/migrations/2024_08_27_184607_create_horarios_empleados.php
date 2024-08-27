<?php

use App\Models\Empleado;
use App\Models\Semana;
use App\Models\Turno;
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
        Schema::create('horarios_empleados', function (Blueprint $table) {
            $table->id();
            $table->enum('dia',['0','1','2','3','4','5','6']);
            $table->boolean('descanso');
            $table->foreignIdFor(Empleado::class);
            $table->foreignIdFor(Turno::class);
            $table->foreignIdFor(Semana::class);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_empleados');
    }
};
