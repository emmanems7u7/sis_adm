<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'imagen' => 'imagen',
            'name' => $this->faker->firstName(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'ci' => $this->faker->randomNumber(8, true), // Genera un número aleatorio de 8 dígitos
            'direccion' => $this->faker->address(),
            'fecha_nac' => $this->faker->date(),
            'libre' => $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Puedes cambiar la contraseña por lo que necesites
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            // Asignar el rol 'empleado' automáticamente
            $user->assignRole('empleado');
        });
    }
}
