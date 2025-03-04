<?php

namespace Database\Factories;

use App\Models\Inventario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InventarioFactory extends Factory
{
    /**
     * El nombre del modelo que se está creando.
     *
     * @var string
     */
    protected $model = Inventario::class;

    /**
     * Defina el modelo de los datos predeterminados.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),  // Genera una palabra aleatoria como nombre
            'descripcion' => $this->faker->sentence(),  // Genera una descripción aleatoria
            'cantidad_disponible' => $this->faker->numberBetween(1, 100),  // Genera un número aleatorio entre 1 y 100
            'categoria' => $this->faker->word(),  // Genera una categoría aleatoria
            'frecuencia_mantenimiento' => $this->faker->randomElement(['Mensual', 'Trimestral', 'Anual']),  // Selecciona aleatoriamente una frecuencia
            'fecha_adquisicion' => $this->faker->date(),  // Genera una fecha aleatoria
            'estado' => $this->faker->boolean(),  // Genera un valor booleano aleatorio (true o false)
        ];
    }
}
