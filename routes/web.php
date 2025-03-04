<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('home');



Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['auth'])->group(function () {
    // Mostrar todos los usuarios
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('user.show');

    // Crear un nuevo usuario
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');


    // Editar un usuario

    Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');

    // Eliminar un usuario
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});



// Ruta para mostrar la lista de inventarios con búsqueda y paginación
Route::get('/inventarios', [InventarioController::class, 'index'])->name('inventarios.index');
Route::get('/Empleados', [UserController::class, 'index'])->name('empleados.index');

// Ruta para mostrar el formulario de creación de inventario
Route::get('/inventarios/create', [InventarioController::class, 'create'])->name('inventarios.create');

// Ruta para almacenar un nuevo inventario
Route::post('/inventarios', [InventarioController::class, 'store'])->name('inventarios.store');

// Ruta para mostrar el formulario de edición de inventario
Route::get('/inventarios/{id}/edit', [InventarioController::class, 'edit'])->name('inventarios.edit');

// Ruta para actualizar un inventario
Route::put('/inventarios/{id}', [InventarioController::class, 'update'])->name('inventarios.update');

// Ruta para eliminar un inventario
Route::delete('/inventarios/{id}', [InventarioController::class, 'destroy'])->name('inventarios.destroy');


// Ruta para subir imagen
Route::post('/inventarios/agregar-imagen', [InventarioController::class, 'agregarImagen'])->name('inventarios.agregarImagen');

// Ruta para eliminar imagen
Route::delete('/inventarios/imagen/{id}', [InventarioController::class, 'eliminarImagen'])->name('inventarios.eliminarImagen');
