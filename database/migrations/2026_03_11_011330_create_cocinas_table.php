<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cocinas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('slug')->unique(); // Para la URL (ej: dona-lety)
        $table->string('categoria');
        $table->string('zona');
        $table->text('descripcion');
        $table->decimal('calificacion', 2, 1)->default(0.0);
        $table->boolean('abierto_24h')->default(false);
        $table->string('horario')->nullable();
        $table->string('telefono')->nullable();
        
        // Imágenes de la cocina
        $table->string('imagen_principal'); 
        $table->string('imagen_fachada')->nullable();
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cocinas');
    }
};
