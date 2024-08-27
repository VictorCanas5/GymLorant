<?php

use App\Models\Productos;
use App\Models\VentaTienda;
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
        Schema::create('ventas_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VentaTienda::class);
            $table->foreignIdFor(Productos::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_producto');
    }
};
