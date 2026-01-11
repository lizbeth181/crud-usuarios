<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    // Listado de usuarios con paginación
    public function index()
    {
        $users = User::latest()->paginate(10);
        return Inertia::render('Users/Index', [
            'users' => $users
        ]);
    }

    // Mostrar formulario de creación
    public function create()
    {
        return Inertia::render('Users/Create');
    }

    // Guardar un nuevo usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'role' => $validated['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado.');
    }

    // NUEVO: Mostrar formulario de edición
    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    // NUEVO: Actualizar el usuario
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // La regla unique ignora el ID del usuario actual para que no de error al no cambiar el email
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string',
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado.');
    }

    // Eliminar usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    // Exportar a CSV
    public function export()
    {
        $users = User::all();
        $csvFileName = 'usuarios.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use($users) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Nombre', 'Email', 'Rol', 'Telefono']);

            foreach ($users as $user) {
                fputcsv($file, [$user->id, $user->name, $user->email, $user->role, $user->phone]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}