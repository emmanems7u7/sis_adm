<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Nombre del evento
            $table->text('descripcion')->nullable(); // Descripción del evento
            $table->dateTime('fecha'); // Fecha y hora de inicio
            $table->string('ubicacion')->nullable(); // Ubicación del evento
            $table->string('geolocalizacion')->nullable(); // Ubicación del evento
            $table->boolean('estado')->default(true); // Estado del evento (activo/inactivo)
            $table->timestamps();
        });

        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha');
            $table->string('ubicacion')->nullable();
            $table->string('geolocalizacion')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::create('usuarios_evento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade'); // Evento asignado
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Usuario asignado
            $table->string('rol')->nullable(); // Rol en el evento (Ej: seguridad, logística, anfitrión)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
