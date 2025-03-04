<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Inventario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        User::factory(20)->create();
        Inventario::factory(50)->create();

        $admin = User::factory()->create([
            'imagen' => 'Diego',
            'name' => 'Diego',
            'apellido_paterno' => 'Chavez',
            'apellido_materno' => 'Ramos',
            'ci' => '12345678',  // Número de cédula o identificación
            'direccion' => '123 Admin St., Admin City', // Dirección
            'fecha_nac' => '1980-01-01', // Fecha de nacimiento
            'libre' => true, // Estado libre (puede ser true o false)
            'email' => 'diego@gmail.com', // Correo electrónico
            'password' => bcrypt('12'), // Contraseña cifrada
        ]);

        // Asignar el rol de 'administrador'
        $admin->assignRole('administrador');

    }
}
