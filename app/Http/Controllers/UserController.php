<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $search = $request->get('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->paginate(5);


        return view('empleados.index', compact('users', 'search'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'ci' => 'required|numeric|max:20',
            'direccion' => 'required|string|max:255',
            'fecha_nac' => 'required|date',
            'email' => 'required|email|unique:users,email',
        ]);

        $pass = Hash::make($validated['name'] . $validated['ci']);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $validated['name'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'ci' => $validated['ci'],
            'direccion' => $validated['direccion'],
            'fecha_nac' => $validated['fecha_nac'],
            'libre' => true,
            'email' => $validated['email'],
            'password' => $pass,


        ]);
        $user->assignRole('empleado');
        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Usuario creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = User::find($id);
        if ($usuario) {
            return response()->json($usuario);
        } else {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'ci' => 'required|numeric|min:6',
            'direccion' => 'required|string|max:255',
            'fecha_nac' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $id,

        ]);
        $user = User::find($id);

        // Actualizar el usuario
        $user->update([
            'name' => $validated['name'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'ci' => $validated['ci'],
            'direccion' => $validated['direccion'],
            'fecha_nac' => $validated['fecha_nac'],
            'email' => $validated['email'],

        ]);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }
}
